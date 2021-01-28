<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
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
