<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 
use App\Http\Requests\SignupRequest; 

class SignupController extends Controller
{
    public function create(){
        return view('auth.signup'); //Vista para el registro
    }

    public function store(SignupRequest $request){


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('home')
            ->with('success', 'Cuenta creada correctamente. Ahora puedes iniciar sesión.');
    }

    
}
