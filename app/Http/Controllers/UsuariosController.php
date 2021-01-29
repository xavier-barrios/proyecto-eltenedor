<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function mostrar(){
<<<<<<< HEAD
    
        // consulta para mostar los datos de los restaurantes en la vista mostrar
=======
        // En el caso de que no se haya inicializado la sesión te redirige al login
        if(!(session()->has('email_usuario'))) {
            return redirect('/');
        }

        // Recogemos todos los datos de la tabla restaurantes
        // $lista=DB::table('restaurante')->get();
>>>>>>> c6a038570d1dfb70d75547b8c4e028fea6e99400
        $lista = DB::select('SELECT restaurante.nombre, restaurante.precio_medio, restaurante.foto, tipo.tipo_cocina, ubicacion.calle
        FROM restaurante 
            INNER JOIN tipo ON restaurante.id_tipo = tipo.id_tipo 
            INNER JOIN ubicacion ON restaurante.id_ubicacion = ubicacion.id_ubicacion');
<<<<<<< HEAD
            // recorremos la variable lista para sacar las fotos y pasarlas a base 64 para mostrarlas por pantalla
            foreach ($lista as $i ) {
                if ($i->foto !=null) {
                    $i->foto = base64_encode($i->foto);
                }
            }
        return view('mostrar', compact('lista'));
    }

    
    
    
=======
        
        // Seteamos valor a la foto con base64_encode
        foreach ($lista as $i ) {
            if ($i->foto !=null) {
                $i->foto = base64_encode($i->foto);
            }
        }

        // Retorna la vista mostrar con los datos de la variable lista
        return view('mostrar', compact('lista'));
    }

    public function modificar() {
        // En el caso de que no se haya inicializado la sesión te redirige al login
        if(!(session()->has('email_usuario'))) {
            return redirect('/');
        }

        return view('modificar');
    }
>>>>>>> c6a038570d1dfb70d75547b8c4e028fea6e99400
}
