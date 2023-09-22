<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuarios');
Route::get('/usuarios/crear', [App\Http\Controllers\UsuarioController::class, 'crear'])->name('usuarios.crear');
Route::post('/usuarios/guardar', [App\Http\Controllers\UsuarioController::class, 'guardar'])->name('usuarios.guardar');
Route::get('/usuarios/editar/{id}', [App\Http\Controllers\UsuarioController::class, 'editar'])->name('usuarios.editar');
Route::get('/usuarios/eliminar/{id}', [App\Http\Controllers\UsuarioController::class, 'eliminar'])->name('usuarios.eliminar');
