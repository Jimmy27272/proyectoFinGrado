<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MotoController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\MotoAdminController;

// Página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Registro
Route::get('/signup', [SignupController::class, 'create'])->name('signup'); // Vista para el registro
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store'); //Procesa el registro cuando se envía el formulario

// Login
Route::get('/login', [LoginController::class, 'create'])->name('login'); // Vista para el login
Route::post('/login', [LoginController::class, 'store'])->name('login.store'); // Procesa el login cuando se envía el formulario
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Procesa el logout cuando se envía el formulario

// Rutas públicas de motos
Route::get('/moto/search', [MotoController::class, 'search'])->name('moto.search');

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

Route::get('/moto/{moto}', [MotoController::class, 'show'])->name('moto.show'); // Solo show es pública


// Rutas de restablecimiento de contraseña
    Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPassword'])->name('password.request');

    Route::post('/forgot-password', [PasswordResetController::class, 'forgotPassword'])->name('password.email');

    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPassword'])->name('password.reset');

    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update'); // Procesa el restablecimiento de contraseña cuando se envía el formulario

 // Rutas de administración
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::delete('/admin/{moto}', [MotoAdminController::class, 'destroy'])->name('admin.destroy');
});
