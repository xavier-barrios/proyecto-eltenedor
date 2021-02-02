<?php

use App\Http\Controllers\LoginRegister;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

///////////////////////////////
////// UsuariosController /////
///////////////////////////////
// Ruta la cual dirige al home
Route::get('home', [UsuariosController::class, 'home']);
Route::get('home2', [UsuariosController::class, 'home2']);
// Ruta que devuelve los datos a mostrar
Route::post('mostrar', [UsuariosController::class, 'mostrar']);
// Ruta que recoge los datos para rellenar el formulario
Route::get('modificar/{id}', [UsuariosController::class,'modificar']);
// Ruta para actualizar los datos del restaurante
Route::put('actualizar/{id}', [UsuariosController::class,'actualizar']);
// Ruta para dar de baja el restaurante
Route::get('baja/{id}', [UsuariosController::class,'baja']);
// Ruta para mostrar vista crear
Route::get('/crear', [UsuariosController::class, 'crear']);
// Ruta para añadir restaurante
Route::post('/crearRestaurante', [UsuariosController::class, 'crearRestaurante']);

///////////////////////////////
//////// LoginRegister ////////
///////////////////////////////
//Ruta default la cual dirige al login
Route::get('/', [LoginRegister::class, 'login']);
//Ruta la cual obtiene los datos del login
Route::get('/recibirlogin', [LoginRegister::class, 'recibirlogin']);
//Ruta la cual obtiene los datos del login
Route::get('/logout', [LoginRegister::class, 'logout']);
//Ruta para obtener los datos del formulario
Route::post('/recibir', [LoginRegister::class, 'recibir']);