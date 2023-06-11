<?php

use App\Http\Controllers\AlumnoController;

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas para los post's
Route::group(['prefix' => 'proyecto', 'controller' => AlumnoController::class], function () {
    // Route::get('/', 'index')->name('proyecto.index');
    Route::get('/create', 'create')->name('proyecto.create');
    Route::get('/integrantes', 'integrantes')->name('proyecto.integrantes');
    Route::get('/edit/{vacante:id}', 'edit')->name('proyecto.edit');
    Route::get('/{vacante:hashname}', 'show')->name('proyecto.show');
    // Route::delete('/create/{post}', 'destroy')->name('proyecto.destroy'); // Guarda solo la imagen, y no el registro completo
    // Route::post('/create/imagen/store', 'store')->name('proyecto.imagen.store'); // Guarda solo la imagen, y no el registro completo
    // Route::get('/{user:username}', 'profile')->name('proyecto.profile');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
