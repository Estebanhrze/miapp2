<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

// Landing y páginas públicas
Route::view('/', 'landing')->name('landing');
Route::view('/nosotros', 'about')->name('about');
Route::view('/soluciones', 'solutions')->name('solutions');
Route::view('/contactos', 'contact')->name('contact');

// 👇 Compatibilidad con Breeze: si intenta ir a 'dashboard', lo enviamos a products
Route::get('/dashboard', fn () => redirect()->route('products.index'))
    ->middleware(['auth','verified'])
    ->name('dashboard');

// Zona autenticada
Route::middleware(['auth','verified'])->group(function () {
    Route::resource('products', ProductController::class)
        ->only(['index','create','store','edit','update','destroy']);

    // Rutas de perfil Breeze
    Route::get('/profile',  [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth (login/register/etc. de Breeze)
require __DIR__.'/auth.php';
