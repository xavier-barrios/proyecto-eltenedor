<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{

    public function home(){
        // En el caso de que no se haya inicializado la sesión te redirige al login
        if(!(session()->has('email_usuario'))) {
            return redirect('/');
        }

        return view('home');
    }

    public function mostrar(){
        // En el caso de que no se haya inicializado la sesión te redirige al login
        if(!(session()->has('email_usuario'))) {
            return redirect('/');
        }

        // Recogemos todos los datos de la tabla restaurantes
        // $lista=DB::table('restaurante')->get();
        $lista = DB::select('SELECT restaurante.*, tipo.tipo_cocina, ubicacion.*
        FROM restaurante 
            INNER JOIN tipo ON restaurante.id_tipo = tipo.id_tipo 
            INNER JOIN ubicacion ON restaurante.id_ubicacion = ubicacion.id_ubicacion');
        
        // Seteamos valor a la foto con base64_encode
        foreach ($lista as $i ) {
            if ($i->foto !=null) {
                $i->foto = base64_encode($i->foto);
            }
        }

        // Retorna la vista mostrar con los datos de la variable lista
        return response()->json($lista ,200);
    }

    public function modificar($id) {
        //Declaramos la query
        $query = "SELECT restaurante.*, ubicacion.*, tipo.* 
        FROM restaurante 
        INNER JOIN ubicacion ON restaurante.id_ubicacion = ubicacion.id_ubicacion 
        INNER JOIN tipo ON restaurante.id_tipo = tipo.id_tipo
        WHERE restaurante.id_restaurante = " .  $id;
        //Recogemos un restaurante de la BD, especificando el id
        $restaurante = DB::select($query)[0];
        //Enviamos los datos obtenidos a la vista actualizar
        return view('modificar', compact('restaurante'));
    }

    /**
     * Actuliza el usuario especificado por el parametro de entrada (id).
     */
    public function actualizar($id, Request $request) {
        // Recibir los datos del formulario con el request.
        $datos = $request->except('_token','Enviar','_method');

        // Para poder modificar el empleado, sin cambiar el correo
        $request->validate([
            'email' => 'sometimes|required|email|unique:empleados,email,'.$id,
        ]);

        //Actualizar la bd con los datos recibidos.
        DB::table('restaurante')->where('id','=',$id)->update($datos);

        //Redirigir a mostrar
        return redirect('mostrar');
    }

    /**
     * Borrar el usuario especificado por el parametro de entrada.
     */
    public function borrar($id) {
        //Eliminamos un empleado de la BD, especificando el id
        DB::table('restaurante')->where('id_restaurante', "=", $id)->delete();
        //Volvemos a la vista mostrar
        return redirect('home');
    }
}
