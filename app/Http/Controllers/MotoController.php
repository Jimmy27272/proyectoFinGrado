<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Moto;
use App\Models\User;
use App\Http\Requests\StoreMotoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $motos = $request->user()
            ->motos()
            ->with(['primaryImage', 'fabricante', 'modelo'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('moto.index', ['motos' => $motos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('moto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMotoRequest $request)
    {
        $data = $request->validated();
            
       
            

        $featuresData = $data['features'] ?? [];

        $images = $request->file('images') ?: [];



       

        

        $data['user_id'] = $request->user()->id;

       $moto = Moto::create($data);

       $moto->features()->create($featuresData);

       foreach ($images as $i => $image) {
            $path = $image->store('images');
            $moto->images()->create([
                'imagen_path' => $path,
                'position' => $i + 1,
            ]);
        }
        

        if ($request->has('published_at')) {
            $moto->published_at = now();
            $moto->save();
        }

        // Redirect to the index page or wherever you want

       return redirect()->route('moto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Moto $moto)
    {
        if(!$moto->published_at){
            abort(404);
        }
        return view('moto.show', ['moto' => $moto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Moto $moto)
    {
        if($moto->user_id !== auth()->id()){
            abort(403, 'No tienes permiso para editar esta moto.');
        }

        return view('moto.edit', ['moto' => $moto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMotoRequest $request, Moto $moto)
    {
         if($moto->user_id !== auth()->id()){
            abort(403);
        }


        $data = $request->validated();

        $features = array_merge([
            'garantia' => 0,	
    'unico_propietario' => 0,	
    'limitable' => 0,
    'abs' => 0,	
    'control_crucero'=> 0,	
    'bluetooth'=> 0,	
    'puños' => 0,	
    'gps' => 0,	
    'alforjas' => 0,	
    'control_traccion' => 0,	
    'led' => 0,	
    'usb' => 0,	
        ], $data['features'] ?? []);

        $moto->update($data);

        $moto->features()->update($features);

        //$request->session()->flash('success', '¡Moto actualizada!'); // Flash message to session

        return redirect()->route('moto.index')
            ->with('success', '¡Moto actualizada!'); // Redirect with success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Moto $moto)
    {
         if($moto->user_id !== auth()->id()){
            abort(403);
        }

        $moto->delete();

        return redirect()->route('moto.index')
            ->with('success', '¡Moto eliminada!'); // Redirect with success message
    }

    public function search(Request $request){

       

        $fabricante = $request->integer('fabricante_id');
        $modelo = $request->integer('modelo_id');
        $MotoTipo = $request->integer('moto_tipo_id');
        $cilindrada = $request->integer('cilindrada_id');
        $comunidad = $request->integer('comunidad_id');
        $ciudad = $request->integer('ciudad_id');
        $yearFrom = $request->integer('year_from');
        $yearTo = $request->integer('year_to');
        $precioFrom = $request->integer('precio_from');
        $precioTo = $request->integer('precio_to');
        $kilometro = $request->integer('kilometros');
        $sort = $request->input('sort', '-published_at');


        $query = Moto::select('motos.*')->where('published_at', '<', now())
            ->with(['primaryImage', 'ciudad', 'MotoTipo', 'cilindrada', 'fabricante', 'modelo', 'favouredUsers']);
            

        if ($fabricante){
            $query->where('fabricante_id', $fabricante);
        }

        if ($modelo){
            $query->where('modelo_id', $modelo);
        }

        if($comunidad){
            $query->join('ciudades', 'ciudades.id', '=', 'motos.ciudad_id')->where('comunidad_id', $comunidad);
        }

        if($ciudad){
            $query->where('ciudad_id', $ciudad);
        }
        if($cilindrada){
            $query->where('cilindrada_id', $cilindrada);
        }

        if($MotoTipo){
            $query->where('moto_tipo_id', $MotoTipo);
        }
        if($yearFrom){
            $query->where('year', '>=', $yearFrom);
        }
        if($yearTo){
            $query->where('year', '<=', $yearTo);
        }
        if($precioFrom){
            $query->where('precio', '>=', $precioFrom);
        }
        if($precioTo){
            $query->where('precio', '<=', $precioTo);
        }
        if($kilometro){
            $query->where('kilometros', '<=', $kilometro);
        }

        if (str_starts_with($sort, '-')) {
    $sortBy = substr($sort, 1);
    $query->orderBy($sortBy, 'desc');
} else {
    $query->orderBy($sort);
}
        

        
            $motos = $query->paginate(15)
            ->withQueryString();

        return view('moto.search', ['motos' => $motos]);
    }

    public function motoImages(Moto $moto)
    {
        return view('moto.images', ['moto' => $moto]);
    }

    public function updateImages(Request $request, Moto $moto){


        // Check if the user is authorized to update images for this moto
        if ($moto->user_id !== auth()->id()) {
            abort(403);
        }


        // Get Validated data of delete images and positions
        $data = $request->validate([
            'delete_images' => 'array',
        'delete_images.*' => 'integer',
        'positions' => 'array',
        'positions.*' => 'integer',
        ]);

        $deleteImages = $data['delete_images'] ?? [];
        $positions = $data['positions'] ?? [];

        // Select images to delete
    $imagesToDelete = $moto->images()->whereIn('id', $deleteImages)->get();

    // Iterate over images to delete and delete them from file system
    foreach ($imagesToDelete as $image) {
        if (Storage::exists($image->imagen_path)) {
            Storage::delete($image->imagen_path);
        }
    }

    // Delete images from the database
    $moto->images()->whereIn('id', $deleteImages)->delete();

    // Iterate over positions and update position for each image, by its ID
    foreach ($positions as $id => $position) {
        $moto->images()->where('id', $id)->update(['position' => $position]);
    }

    // Redirect back to moto.images route
    return redirect()->back()
        ->with('success', '¡Imágenes actualizadas!'); // Redirect with success message
    }


        public function addImages(Request $request, Moto $moto)
{
    // Get images from request
    $images = $request->file('images') ?? [];

    // Select max position of car images
    $position = $moto->images()->max('position') ?? 0;
    foreach ($images as $image) {
        // Save it on the file system
        $path = $image->store('images');
        // Save it in the database
        $moto->images()->create([
            'imagen_path' => $path,
            'position' => $position + 1
        ]);
        $position++;
    }

    return redirect()->back()
        ->with('success', '¡Imágenes añadidas!'); // Redirect with success message
}
}
