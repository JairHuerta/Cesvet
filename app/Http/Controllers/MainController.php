<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Especie;
use App\Productos;
use Illuminate\Http\Request;

class MainController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke(Request $request)
    {
        $categorias = Categoria::all();
        $productos = Productos::all();
        return view('home', compact('productos', 'categorias'));
    }

    /*public function busqueda($id)
    {
        $productos = Productos::where('categoria_id', $id)->get();
        $categorias = Categoria::all();
        return view('inicio', compact('productos', 'categorias'));
    }*/

    public function servicios(){
        return view('servicios');
    }
    public function acerca(){
        return view('acerca');
    }
    public function contactanos(){
        return view('contactanos');
    }

    public function terminos(){
        return view('terminos');
    }

     public function admine(){
        return view('admine');
    }
    public function mensaje(){
        return view('mensajes');
    }

     public function catalogo(){
        $categorias = Categoria::all();
        $productos = Productos::all();
        return view('catalogo', compact('categorias', 'productos'));
    }




}