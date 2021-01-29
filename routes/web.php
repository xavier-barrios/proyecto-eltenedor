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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/',[UsuariosController::class, 'login']);
// Route::get('/', [UsuariosController::class,'index']);
Route::get('home', [UsuariosController::class,'mostrar']);
// Route::get('/mostrar',[UsuariosController::class, 'mostrar']);

///////////////////////////////
//////// LoginRegister ////////
///////////////////////////////
//Ruta default la cual dirige al login
Route::get('/', [LoginRegister::class, 'login']);
Route::get('/login', [LoginRegister::class, 'login']);
//Ruta la cual obtiene los datos del login
Route::get('/recibirlogin', [LoginRegister::class, 'recibirlogin']);
//Ruta la cual obtiene los datos del login
Route::get('/logout', [LoginRegister::class, 'logout']);

