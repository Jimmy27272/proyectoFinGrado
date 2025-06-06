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
    public function index(Request $request)
    {
        
        $motos = $request->user()
            ->motos()
            ->with(['primaryImage', 'fabricante', 'modelo'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('moto.index', ['motos' => $motos]);
    }

    
    public function create()
    {
        return view('moto.create'); // Vista para crear una nueva moto
    }

    
    public function store(StoreMotoRequest $request)
    {
        $data = $request->validated(); // Obtiene los datos validados del formulario
            
        $featuresData = $data['features'] ?? []; // Datos de características de la moto, si no existen, se inicializan como un array vacío

        $images = $request->file('images') ?: []; // Si no se subieron imágenes, se inicializa como un array vacío

        $data['user_id'] = $request->user()->id; //

       $moto = Moto::create($data);

       $moto->features()->create($featuresData);

       foreach ($images as $i => $image) {
            $path = $image->store('images', 'public');
            $moto->images()->create([
                'imagen_path' => $path,
                'position' => $i + 1,
            ]);
        }
        

        $moto->published_at = now();
        $moto->save();


       return redirect()->route('moto.index'); // Redirige a la lista de motos
    }

    public function show(Request $request, Moto $moto)
    {
        return view('moto.show', ['moto' => $moto]);
    }

    
    public function edit(Moto $moto)
    {
        if($moto->user_id !== auth()->id()){
            abort(403, 'No tienes permiso para editar esta moto.');
        }

        return view('moto.edit', ['moto' => $moto]);
    }

    
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

        

        return redirect()->route('moto.index')
            ->with('success', '¡Moto actualizada!'); 
    }

    
    public function destroy(Moto $moto)
    {
         if($moto->user_id !== auth()->id()){
            abort(403);
        }

        $moto->delete();

        return redirect()->route('moto.index')
            ->with('success', '¡Moto eliminada!'); 
    }

    public function search(Request $request){

       
        // obtiene los parámetros de búsqueda del request
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

        // Consulta para buscar motos
        $query = Moto::select('motos.*')->where('published_at', '<', now())
            ->with(['primaryImage', 'ciudad', 'MotoTipo', 'cilindrada', 'fabricante', 'modelo', 'favouredUsers']);
            
        // Aplicar los filtros de búsqueda
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
        // Ordenar los resultados según el parámetro 'sort'
        if (str_starts_with($sort, '-')) { // Si el sort empieza con un guion, significa que es descendente
    $sortBy = substr($sort, 1); // Elimina el guion para obtener el nombre del campo
    $query->orderBy($sortBy, 'desc'); // Ordena por el campo especificado en orden descendente
} else {
    $query->orderBy($sort); // Si no empieza con un guion, ordena por el campo especificado en orden ascendente
}
        

            $motos = $query->paginate(15) // Paginación de resultados, 15 motos por página
            ->withQueryString(); // mantiene los parámetros de búsqueda en la paginación

        return view('moto.search', ['motos' => $motos]);
    }

    public function motoImages(Moto $moto)
    {
        return view('moto.images', ['moto' => $moto]);
    }

    public function updateImages(Request $request, Moto $moto){


        // si el usuario autenticado no es el dueño de la moto, aborta con error 403
        if ($moto->user_id !== auth()->id()) {
            abort(403);
        }


        // validar request data
        $data = $request->validate([
            'delete_images' => 'array',
        'delete_images.*' => 'integer',
        'positions' => 'array',
        'positions.*' => 'integer',
        ]);

        $deleteImages = $data['delete_images'] ?? [];
        $positions = $data['positions'] ?? [];

        // Seleccionar las imágenes a eliminar de la moto
    $imagesToDelete = $moto->images()->whereIn('id', $deleteImages)->get();

    // borrar las imágenes del sistema de archivos
    foreach ($imagesToDelete as $image) {
        if (Storage::exists($image->imagen_path)) {
            Storage::delete($image->imagen_path);
        }
    }

    // borrar las imágenes de la base de datos
    $moto->images()->whereIn('id', $deleteImages)->delete();

    // Actualizar las posiciones de las imágenes restantes
    foreach ($positions as $id => $position) {
        $moto->images()->where('id', $id)->update(['position' => $position]);
    }

    // redireccionar a la vista de imágenes de la moto con un mensaje de éxito
    return redirect()->back()
        ->with('success', '¡Imágenes actualizadas!'); 
    }


public function addImages(Request $request, Moto $moto)
{
    // 
    $images = $request->file('images') ?? [];

    // Seleccionar las imágenes a añadir a la moto
    $position = $moto->images()->max('position') ?? 0;
    foreach ($images as $image) {
        // guardar la imagen en el sistema de archivos
        $path = $image->store('images', 'public');
        // crear una nueva imagen en la base de datos asociada a la moto
        $moto->images()->create([
            'imagen_path' => $path,
            'position' => $position + 1
        ]);
        $position++;
    }

    return redirect()->back()
        ->with('success', '¡Imágenes añadidas!'); // Redirige a la vista de imágenes de la moto con un mensaje de éxito
}
}
