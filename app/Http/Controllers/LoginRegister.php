<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginRegister extends Controller
{
    /**
     * Login
     */
    public function login()
    {
        return view('login');
    }


    /**
     * Logout
     */
    public function logout() {
        session()->flush();
        Auth::logout();
        session()->forget(['email_usuario']);
        return redirect('/');
    }

    /**
     * Validacion login.
     */
    public function recibirlogin(Request $request) {
        // Recibir los datos del formulario con el request.
        $datos = $request->except('_token','Entrar');

        // Verificamos que existe el usuario con los datos aportados
        $pasa = DB::table('usuarios')->where([
            ['correo', '=', $datos['email']], 
            ['contra', '=', $datos['password']]
            ])->count();

        // Recogemos todos los datos del admin con los datos aportados
        $result = DB::table('usuarios')->where([
            ['correo', '=', $datos['email']], 
            ['contra', '=', $datos['password']]
            ])->first();

        // Si existe el admin, la variable $pasa valdrá 1, entonces entrar en el if
        // de lo contrario pasa por el else y nos redirige al login
        if($pasa > 0) {
            // Establecer sesion y redirigir a la pagina mostrar.
            // dd($result);
            session()->put('email_usuario', $request->email);
            return redirect('home');
        } else {
            // Redirigir al login
            return redirect('/');
        }
    }
}
