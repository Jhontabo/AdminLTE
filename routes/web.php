<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirigir la ruta principal a la página de blogs
Route::get('/', function () {
    return redirect()->route('posts.index');
});

// Ruta para listar todos los posts del blog
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');

// Ruta para mostrar un post individual según su slug
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// Ruta para cambiar el idioma
Route::get('/language/{locale}', function ($locale) {
    if (array_key_exists($locale, config('app.supported_locales'))) {
        session()->put('locale', $locale);
    }

    return redirect()->back();
})->name('locale');

// Grupo de rutas protegidas por autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Puedes definir rutas protegidas aquí
    // Ejemplo de dashboard si es necesario
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});
