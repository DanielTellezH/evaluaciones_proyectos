<?php

use App\Http\Controllers\AdminController;

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SinodalController;

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

// Rutas para el proyecto
Route::group(['prefix' => 'proyecto', 'controller' => AlumnoController::class], function () {
    Route::get('/', 'index')->name('proyecto.index');
    Route::get('/create', 'create')->name('proyecto.create');
    Route::get('/entrega/comentarios/{entrega:id}', 'comentarios')->name('proyecto.entrega.comentarios');
    Route::get('/integrantes', 'integrantes')->name('proyecto.integrantes');
});

// Rutas para los proyectos (Profesor)
Route::group(['prefix' => 'proyectos', 'controller' => AdminController::class], function () {
    Route::get('/', 'index')->name('proyectos.index');
    Route::get('/entregas/{proyecto:hashname}', 'entregas')->name('proyectos.entregas');
    Route::get('/calificar/{entrega:id}', 'calificar')->name('proyectos.calificar');
    Route::get('/fechas/{proyecto:hashname}', 'fechas')->name('proyectos.fechas');
    Route::get('/sinodales/{proyecto:hashname}', 'sinodales')->name('proyectos.sinodales');
});

// Rutas para los proyectos (Asesor)
Route::group(['prefix' => 'proyectos-asesor', 'controller' => AsesorController::class], function () {
    Route::get('/', 'index')->name('proyectos_asesor.index');
});

// Rutas para los proyectos (Sinodal)
Route::group(['prefix' => 'proyectos-sinodal', 'controller' => SinodalController::class], function () {
    Route::get('/', 'index')->name('proyectos_sinodal.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
