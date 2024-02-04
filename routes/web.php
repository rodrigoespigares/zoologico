<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RutasController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VisitasController;
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
Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuarios','index');
    Route::get('/usuarios/ver/{id}','show');
    Route::get('/usuarios/destroy/{id}','destroy')->middleware('checkrole:admin');
    Route::post('/usuarios/editar/{id}','edit');
});

Route::controller(AdministradorController::class)->group(function () {
    Route::get('/administrador','index')->middleware('checkrole:guia,admin,cuidador');

    /* PREFERENCIAS DE LOS GUIAS */
    Route::get('/guia/preferencias','cargaPreferencias')->middleware('checkrole:guia,admin');
    Route::post('/preferencias/crear','crearPreferencias')->middleware('checkrole:guia,admin');
    Route::post('/preferencias/guardar','modificarPreferencias')->middleware('checkrole:guia,admin');


    /* LISTADO ANIMALES DE CUIDADORES */
    Route::get('/verlistadoanimales', 'listaAnimales')->middleware('checkrole:guia,admin');
    Route::get('/editarlistadoanimales/{id}', 'listaAnimales')->middleware('checkrole:guia,admin');

    /* LISTADO DE RUTAS PARA LOS GUIAS */
    Route::get('/verlistadorutas', 'listaRutas')->middleware('checkrole:guia,admin');
    Route::get('/editarlistadorutas/{id}', 'listaRutas')->middleware('checkrole:guia,admin');

    /* LISTADO DE USERS PARA LOS USUARIOS */
    Route::get('/verlistadousers', 'listaUsuarios')->middleware('checkrole:admin');
    Route::get('/editarlistadouser/{id}', 'listaUsuarios')->middleware('checkrole:admin');
});


Route::controller(VisitasController::class)->group(function () {
    Route::get('/entradas','index');
});

require __DIR__.'/auth.php';
