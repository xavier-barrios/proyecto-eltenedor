<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function home(){
        return view('home');
    }

    public function mostrar(Request $request){
        // En el caso de que no se haya inicializado la sesión te redirige al login
        if(!(session()->has('email_usuario'))) {
            return redirect('/');
        }
        $filtro = $request->input('filtro');
        $filtro2 = $request->input('filtro2');
        // Recogemos todos los datos de la tabla restaurantes
        // $lista=DB::table('restaurante')->get();
        if ($filtro == "" || $filtro2 == "") {
            $lista = DB::select('SELECT restaurante.nombre, restaurante.foto, restaurante.precio_medio,  restaurante.precio_medio, restaurante.foto, tipo.tipo_cocina, ubicacion.calle
            FROM restaurante 
                INNER JOIN tipo ON restaurante.id_tipo = tipo.id_tipo 
                INNER JOIN ubicacion ON restaurante.id_ubicacion = ubicacion.id_ubicacion');
        }else {
            $lista = DB::select('SELECT restaurante.nombre, restaurante.foto, restaurante.precio_medio,  restaurante.precio_medio, restaurante.foto, tipo.tipo_cocina, ubicacion.calle
            FROM restaurante 
            INNER JOIN tipo ON restaurante.id_tipo = tipo.id_tipo 
            INNER JOIN ubicacion ON restaurante.id_ubicacion = ubicacion.id_ubicacion
            WHERE tipo.tipo_cocina LIKE ?
            AND restaurante.precio_medio LIKE ?',["%".$filtro."%", "%".$filtro2."%"]);
        }
        
        
        // Seteamos valor a la foto con base64_encode
        foreach ($lista as $i ) {
            if ($i->foto !=null) {
                $i->foto = base64_encode($i->foto);
            }
        }

        // Retorna la vista mostrar con los datos de la variable lista
        return response()->json($lista ,200);
    }

    public function modificar() {
        // En el caso de que no se haya inicializado la sesión te redirige al login
        if(!(session()->has('email_usuario'))) {
            return redirect('/');
        }

        return view('modificar');
    }
}
