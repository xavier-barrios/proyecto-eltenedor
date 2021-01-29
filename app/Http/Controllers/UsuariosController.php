<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    // public function mostrar(){
    //     //comprueba la sesion
    //     // if (!session()->has('data')){
    //     //     return redirect ('/');
    //     // }
    //     // coger todos los datos de la tabla restaurantes
    //     // $lista=DB::table('restaurante')->get();
    //     $lista = DB::select('SELECT restaurante.nombre, restaurante.precio_medio, restaurante.foto, tipo.tipo_cocina, ubicacion.calle
    //     FROM restaurante 
    //         INNER JOIN tipo ON restaurante.id_tipo = tipo.id_tipo 
    //         INNER JOIN ubicacion ON restaurante.id_ubicacion = ubicacion.id_ubicacion');
    //         foreach ($lista as $i ) {
    //             if ($i->foto !=null) {
    //                 $i->foto = base64_encode($i->foto);
    //             }
    //         }
    //     // return $lista;
    //     // hace referencia a $lista y lo encia a mostrarvista
    //     // compact -> pasarle mas de una variable a lista
    //     return view('mostrar', compact('lista'));
    // }

    public function mostrar()
    {
        $restaurante=DB::SELECT('SELECT restaurante.nombre, tipo.tipo_cocina, ubicacion.calle
        FROM restaurante 
            INNER JOIN tipo ON restaurante.id_tipo = tipo.id_tipo 
            INNER JOIN ubicacion ON restaurante.id_ubicacion = ubicacion.id_ubicacion');
            // return view('mostrar', compact('lista'));
        return response()->json($restaurante, 200);
    }

    public function index(){
        return view('home');
    }
}
