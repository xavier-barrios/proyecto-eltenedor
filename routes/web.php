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
Route::get('home', [UsuariosController::class, 'home']);
Route::post('mostrar', [UsuariosController::class, 'mostrar']);
// Route::get('modificar', [UsuariosController::class,'modificar']);
// Route::get('mostrar', [UsuariosController::class, 'mostrar']);
Route::get('modificar/{id}', [UsuariosController::class,'modificar']);
Route::put('actualizar/{id}', [UsuariosController::class,'actualizar']);
Route::get('eliminar/{id}', [UsuariosController::class,'borrar']);

///////////////////////////////
//////// LoginRegister ////////
///////////////////////////////
//Ruta default la cual dirige al login
Route::get('/', [LoginRegister::class, 'login']);
// Route::get('/login', [LoginRegister::class, 'login']);
//Ruta la cual obtiene los datos del login
Route::get('/recibirlogin', [LoginRegister::class, 'recibirlogin']);
//Ruta la cual obtiene los datos del login
Route::get('/logout', [LoginRegister::class, 'logout']);
//Ruta para obtener los datos del formulario
Route::post('/recibir', [LoginRegister::class, 'recibir']);