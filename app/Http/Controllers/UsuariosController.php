<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function mostrar(){
    
        // consulta para mostar los datos de los restaurantes en la vista mostrar
        $lista = DB::select('SELECT restaurante.nombre, restaurante.precio_medio, restaurante.foto, tipo.tipo_cocina, ubicacion.calle
        FROM restaurante 
            INNER JOIN tipo ON restaurante.id_tipo = tipo.id_tipo 
            INNER JOIN ubicacion ON restaurante.id_ubicacion = ubicacion.id_ubicacion');
            // recorremos la variable lista para sacar las fotos y pasarlas a base 64 para mostrarlas por pantalla
            foreach ($lista as $i ) {
                if ($i->foto !=null) {
                    $i->foto = base64_encode($i->foto);
                }
            }
        return view('mostrar', compact('lista'));
    }

    
    
    
}
