<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SignupRequest; // Importa la solicitud de registro


class LoginController extends Controller
{
    public function create(){
        return view('auth.login'); //Vista para el login
    }

    public function store(SignupRequest $request){
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required','string','min:8']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success', 'Has iniciado sesión correctamente.');
        }

        return  redirect()->back()->withErrors([
        'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
    ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Has cerrado sesión correctamente.');
    }
}
