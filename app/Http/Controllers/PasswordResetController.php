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
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request){
        $request->validate([
            'email' => ['required','email']
        ]);

       $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Se ha enviado un enlace de restablecimiento de contraseña a su correo electrónico.');

         }
        return back()->withErrors(['email' => 'No hay ningún usuario asociado a este email' ])->withInput($request->only('email'));
        

        
    }

    public function showResetPassword(){

        return view('auth.reset-password');

    }

    public function resetPassword(Request $request){

        $request->validate([
            'password' => ['required', 'confirmed', 'min:8'],
            'email' => ['required', 'email'],
            'token' => ['required']
        ]);

        $status = Password::reset(
            $request->only(['email','password', 'password_confirmation', 'token']),
            function (User $user, string $password) {

                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));


                $user->save();

                event(new PasswordReset($user));
            }
                );
                

                if ($status === Password::PASSWORD_RESET) {
                    return redirect()->route('login')->with('success', 'Contraseña restablecida correctamente. Ahora puedes iniciar sesión.');
                }

        return back()->withErrors(['email' => 'El enlace de restablecimiento de contraseña es inválido o ha expirado.']);
                     


       

    }
}


   