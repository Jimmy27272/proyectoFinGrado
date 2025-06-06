<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;



class PasswordResetController extends Controller
{
    public function showForgotPassword() // Método para mostrar la vista de "Olvidé mi contraseña"
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request){ // Método para manejar la solicitud de restablecimiento de contraseña
        $request->validate([ // Validación de los datos del formulario
            'email' => ['required','email']
        ]);

       $status = Password::sendResetLink( // Envío del enlace de restablecimiento de contraseña
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) { // Si el enlace se envió correctamente, redirige con un mensaje de éxito
            return back()->with('success', 'Se ha enviado un enlace de restablecimiento de contraseña a su correo electrónico.');

         }
        return back()->withErrors(['email' => 'No hay ningún usuario asociado a este email' ])->withInput($request->only('email'));
        

        
    }

    public function showResetPassword(){ // Método para mostrar la vista de restablecimiento de contraseña

        return view('auth.reset-password');

    }

    public function resetPassword(Request $request){ // Método para manejar la solicitud de restablecimiento de contraseña

        $request->validate([ // Validación de los datos del formulario
            'password' => ['required', 'confirmed', 'min:8'],
            'email' => ['required', 'email'],
            'token' => ['required']
        ]);

        $status = Password::reset( // Restablecimiento de la contraseña del usuario
            $request->only(['email','password', 'password_confirmation', 'token']),
            function (User $user, string $password) { // Callback que se ejecuta al restablecer la contraseña

                $user->forceFill([ // Forzar el llenado de los campos del usuario
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));


                $user->save();

                event(new PasswordReset($user)); // Disparar el evento de restablecimiento de contraseña
            }
                );
                

                if ($status === Password::PASSWORD_RESET) { // Si la contraseña se restableció correctamente, redirige con un mensaje de éxito
                    return redirect()->route('login')->with('success', 'Contraseña restablecida correctamente. Ahora puedes iniciar sesión.');
                }

        return back()->withErrors(['email' => 'El enlace de restablecimiento de contraseña es inválido o ha expirado.']);
                     


       

    }
}


   