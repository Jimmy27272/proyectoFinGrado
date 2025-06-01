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

        
        
        $motos = Moto::where('published_at', '<', now())
            ->with(['primaryImage', 'ciudad', 'MotoTipo', 'cilindrada', 'fabricante', 'modelo', 'favouredUsers'])
            ->orderBy('published_at', 'desc')
            ->limit(15)
            ->get();
        

        return view('home.index', ['motos' =>$motos]);
           
    }
}
