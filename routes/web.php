<?php

use App\Http\Controllers\AnimalController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AnimalController::class)->group(function () {
    Route::get('/animales','index'); 
    Route::get('/animales/ver/{id}','show'); 
    Route::get('/animales/crear_animal','create')->middleware('checkrole:cuidador'); 
    Route::post('/animales/alamacenar','store')->middleware('checkrole:cuidador'); 
    Route::get('/animales/destroy/{id}','destroy')->middleware('checkrole:cuidador'); 
});

require __DIR__.'/auth.php';
