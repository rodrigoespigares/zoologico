<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RutasController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AnimalController::class)->group(function () {
    Route::get('/animales','index');
    Route::get('/animales/ver/{id}','show');
    Route::get('/animales/crear_animal','create')->middleware('checkrole:cuidador');
    Route::post('/animales/alamacenar','store')->middleware('checkrole:cuidador,admin');
    Route::get('/animales/destroy/{id}','destroy')->middleware('checkrole:cuidador,admin');
    Route::post('/animales/editar/{id}','edit');
});

Route::controller(RutasController::class)->group(function () {
    Route::get('/rutas','index');
    Route::get('/rutas/ver/{id}','show');
    Route::post('/rutas/alamacenar','store')->middleware('checkrole:guia,admin');
    Route::get('/rutas/destroy/{id}','destroy')->middleware('checkrole:guia,admin');
    Route::post('/rutas/editar/{id}','edit');
});

Route::controller(AdministradorController::class)->group(function () {
    Route::get('/administrador','index');
    
    Route::get('/guia/preferencias','cargaPreferencias');
    Route::post('/preferencias/crear','crearPreferencias');
    Route::post('/preferencias/guardar','modificarPreferencias');

    

    Route::get('/verlistadoanimales', 'listaAnimales');
    Route::get('/editarlistadoanimales/{id}', 'listaAnimales');
    Route::get('/verlistadorutas', 'listaRutas');
    Route::get('/editarlistadorutas/{id}', 'listaRutas');
    Route::get('/verlistadousers', 'listaUsuarios');
    Route::get('/editarlistadouser/{id}', 'listaUsuarios');
});

require __DIR__.'/auth.php';
