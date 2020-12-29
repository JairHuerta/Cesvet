<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Pedido;
use App\Productos;
use Illuminate\Http\Request;

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
        $this->verificaPedidoNuevo();
        $productos = Productos::all();
        $categorias = Categoria::all();
        return view('home', compact('productos', 'categorias'));
    }

    public function busqueda($id)
    {
     $this->verificaPedidoNuevo();
     $productos = Productos::where('categoria_id', $id)->get();
     $categorias = Categoria::all();
      return view('home', compact('productos', 'categorias'));
    }

    public function verificaPedidoNuevo(){
        if(auth()->user()->rol === 'cliente'){
            $id_user = auth()->user()->id;
            $pedidoC = Pedido::where(['estatus'=>'espera','user_id'=>$id_user])->get()->count();
            if($pedidoC == 0){
                auth()->user()->pedidos()->create();
            }
        }
    }
}
