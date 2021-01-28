<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function mostrar(){
        //comprueba la sesion
        // if (!session()->has('data')){
        //     return redirect ('/');
        // }
        // coger todos los datos de la tabla restaurantes
        // $lista=DB::table('restaurante')->get();
        // return $lista;
        // hace referencia a $lista y lo encia a mostrarvista
        // compact -> pasarle mas de una variable a lista
        return view('mostrar', compact('lista'));
    }
}
