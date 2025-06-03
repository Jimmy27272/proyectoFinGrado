<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Moto;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $usersCount = User::count();
        $motosCount = Moto::count();

        $search = $request->input('search');

        $motosQuery = Moto::query();

        if ($search) {
            $motosQuery->where('year', 'like', "%{$search}%")
                ->orWhereHas('fabricante', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                }) 
                ->orWhereHas('modelo', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
        }

        $motos = $motosQuery->latest()->take(15)->get(); // Obtener las últimas 15 motos

        return view('admin.dashboard', compact('usersCount', 'motosCount', 'motos', 'search')); // Pasar las motos y el conteo de usuarios y motos a la vista
    }
}
