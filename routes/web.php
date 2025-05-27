<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MotoController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\PasswordResetController;



// Página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Registro
Route::get('/signup', [SignupController::class, 'create'])->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');

// Login
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas públicas de motos
Route::get('/moto/search', [MotoController::class, 'search'])->name('moto.search');
Route::get('/moto/{moto}', [MotoController::class, 'show'])->name('moto.show'); // Solo show es pública

// Rutas protegidas por auth
Route::middleware('auth')->group(function () {
    Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
    Route::post('/watchlist/{moto}', [WatchlistController::class, 'storeDestroy'])->name('watchlist.storeDestroy');

    // CRUD de motos (except}o show)
    Route::resource('moto', MotoController::class)->except(['show']);

    // Gestión de imágenes de motos
    Route::get('/moto/{moto}/images', [MotoController::class, 'motoImages'])->name('moto.images');
    Route::put('/moto/{moto}/images', [MotoController::class, 'updateImages'])->name('moto.updateImages');
    Route::post('/moto/{moto}/images', [MotoController::class, 'addImages'])->name('moto.addImages');
});


// Rutas de restablecimiento de contraseña
    Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPassword'])->name('password.request');

    Route::post('/forgot-password', [PasswordResetController::class, 'forgotPassword'])->name('password.email');

    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPassword'])->name('password.reset');

    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

/*<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MotoController;

Route::get('/', [HomeController::class, 'index'])->name('home'); //Ruta para la página de inicio

Route::get('/signup', [SignupController::class, 'create'])->name('signup'); //Ruta para el registro

Route::post('/signup', [SignupController::class, 'store'])->name('signup.store'); //Ruta para el registro

Route::get('/login', [LoginController::class, 'create'])->name('login'); //Ruta para el login

Route::post('/login', [LoginController::class, 'store'])->name('login.store'); //Ruta para el login

Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); //Ruta para el logout

Route::get('/moto/search', [MotoController::class, 'search'])->name('moto.search'); //Ruta para buscar motos

Route::get('/moto/watchlist', [MotoController::class, 'watchlist'])->name('moto.watchlist'); //Ruta para la lista de deseos de motos

Route::resource('moto', MotoController::class); //Ruta para el CRUD de motos

Route::get('/moto/{moto}/images', [MotoController::class, 'motoImages'])->name('moto.images'); //Ruta para las imágenes de una moto

Route::put('/moto/{moto}/images', [MotoController::class, 'updateImages'])->name('moto.updateImages');

Route::post('/moto/{moto}/images', [MotoController::class, 'addImages'])->name('moto.addImages'); */