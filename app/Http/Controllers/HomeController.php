<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Moto; 
use App\Models\MotoTipo;
use App\Models\Fabricante;
use App\Models\User;




class HomeController extends Controller
{
    public function index(){

        $motos = Moto::where('published_at', '<', now()) // Filtra las motos que han sido publicadas antes de la fecha actual
            ->with(['primaryImage', 'ciudad', 'MotoTipo', 'cilindrada', 'fabricante', 'modelo', 'favouredUsers']) // Carga las relaciones necesarias para mostrar la información de las motos
            ->orderBy('published_at', 'desc') // Ordena las motos por la fecha de publicación, de más reciente a más antigua
            ->limit(15)
            ->get();
        

        return view('home.index', ['motos' =>$motos]); // retorna la vista de inicio con las motos publicadas
           
    }
}
