<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Moto;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class WatchlistController extends Controller
{
    public function index(){  //Mostrar la lista de motos favoritas del usuario autenticado
        $motos = auth()->user()
        ->favouriteMotos()
        ->with(['primaryImage', 'ciudad', 'MotoTipo', 'cilindrada', 'fabricante', 'modelo'])
        ->paginate(15);
        return view('watchlist.index', ['motos' => $motos]);

    }

    public function storeDestroy(Moto $moto){  // Añadir o eliminar una moto de la lista de favoritos

        $user = Auth::user();
        
        if ($user->favouriteMotos->contains($moto)){
            $user->favouriteMotos()->detach($moto);
            return back()->with('success', 'Moto eliminada de la lista de favoritos.');
        } 
            $user->favouriteMotos()->attach($moto);
            return back()->with('success', 'Moto añadida a la lista de favoritos.');
        

    }
}
