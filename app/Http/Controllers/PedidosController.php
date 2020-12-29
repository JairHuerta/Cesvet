<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Producto;
use DB;
use Illuminate\Http\Request;

class PedidosController extends Controller
{      

    public function __construct()
    {
        //$this->middleware('checkAdmin');
    }



	public function index(){
		//Consulta Pedido Actual para listar productos
        if(auth()->user()->rol === 'cliente'){
            $id_user = auth()->user()->id;
            $pedido = Pedido::where(['user_id'=>$id_user, 'estatus'=>'espera'])->get()->first();
            $pedidosProceso = Pedido::where(['user_id'=>$id_user, 'estatus'=>'proceso'])->get();
            $pedidosFinalizados = Pedido::where(['user_id'=>$id_user, 'estatus'=>'finalizado'])->get();
            return view('pedidos.index', compact('pedido','pedidosProceso', 'pedidosFinalizados'));
            //return Pedido::find('2')->with('productos')->get();
        }else{
            $pedidosProceso = Pedido::where(['estatus'=>'proceso'])->get();
            $pedidosFinalizados = Pedido::where(['estatus'=>'finalizado'])->get();
            return view('pedidos.pedidosAdmin', compact('pedidosProceso', 'pedidosFinalizados'));

        }
    }

    public function addProducto(Request $request){
    	//Añade productos al Pedido
    	$id_p = $request->input('id');	//extrae el id del roducto a agregar
    	$id_user = auth()->user()->id;	//extrae el id del usuario autenticado
    	//Obtiene pedido actual sobre el que se agregarán productos
    	$pedido = Pedido::where(['user_id'=>$id_user, 'estatus'=>'espera'])->get()->first();
    	//verifica si existe el producto en el pedido actual
    	$concepto = DB::table('pedido_producto')->where(['pedido_id'=>$pedido->id,'producto_id'=>$id_p])->get()->count();
    	//en caso de que no exista, lo agrega al pedido
    	if($concepto==0){
    		$producto = Producto::find($id_p);
            $numActualProductos = $producto->existencias;
            if($numActualProductos >= $request->input('cantidad')){
                $restantes = $numActualProductos - $request->input('cantidad');
                $pedido->productos()->attach($id_p,['cantidad'=> $request->input('cantidad')]);
                $producto->update(['existencias'=>$restantes]);
            }else{
    		      return back();
            }
    	}else{
            return back();
        }
    	return redirect()->action('PedidosController@index');//view('pedidos.index', compact('pedido'));
    }

    public function sumaProducto(Request $request){
    	$id_user = auth()->user()->id;
        $id_p = $request->input('id_p');
        $producto = Producto::find($id_p);
        $cantidadP = $request->input('cantidadP');
        $cantidad = $request->input('cantidad');	//extrae el id del usuario autenticado
    	//Obtiene pedido actual sobre el que se agregarán productos
    	$pedido = Pedido::where(['user_id'=>$id_user, 'estatus'=>'espera'])->get()->first();
  		//Actualiza cantidad en registro existente
        $diferencia = $cantidad - $cantidadP;
        if($diferencia>0){
            if($diferencia <= $producto->existencias){
                $existencias = $producto->existencias - $diferencia;
                $producto->update(['existencias'=>$existencias]);
                $pedido->productos()->updateExistingPivot($request->input('id_p'),['cantidad'=>$request->input('cantidad')]);    
            }else{
                return back();
            }
        }else{
            $existencias = $producto->existencias - $diferencia;
            $producto->update(['existencias'=>$existencias]);
            $pedido->productos()->updateExistingPivot($request->input('id_p'),['cantidad'=>$request->input('cantidad')]);
        }
		  //$existencias = $producto->existencias - $diferencia;
        return redirect()->action('PedidosController@index');//view('pedidos.index', compact('pedido'));
        //

    }

    public function quitaProducto($id){
    	$id_user = auth()->user()->id;	//extrae el id del usuario autenticado
    	//Obtiene pedido actual sobre el que se agregarán productos
    	$pedido = Pedido::where(['user_id'=>$id_user, 'estatus'=>'espera'])->get()->first();
    	//Elimina concepto de pedido
        $producto = Producto::find($id);
        $numActualProductos = $producto->existencias;
        $registro = DB::table('pedido_producto')->where(['pedido_id'=>$pedido->id,'producto_id'=>$id])->get()->first();
        $existencias = $producto->existencias + $registro->cantidad;
        $producto->update(['existencias'=>$existencias]);
        //$restantes = $numActualProductos + $pedido->productos->pivot->cantidad;
        //$producto->update(['existencias'=>$restantes]);
    	$pedido->productos()->detach($id);

        //if ($numActualProductos >= $request->input('cantidad')) {
          //      $pedido->productos()->detach($id_p,['cantidad'=> $request->input('cantidad')]);
        //}else{
          //        return back();
            //}

    	return redirect()->action('PedidosController@index');//view('pedidos.index', compact('pedido'));
    }

    public function store(Request $request){
    	$id_user = auth()->user()->id;	//extrae el id del usuario autenticado
    	$pedido = Pedido::where(['user_id'=>$id_user, 'estatus'=>'espera'])->get()->first();

    	$pedido->update([
    		'iva'=>$request->input('iva'),
    		'total'=>$request->input('total'),
    		'direccion'=>$request->input('direccion'),
    		'metodo_pago'=>$request->input('metodo_pago'),
    		'estatus'=>'proceso'
    	]);
    	return redirect()->route('home');
    }

    public function finalizar($id){
        $pedido = Pedido::find($id);
        $pedido->update(['estatus'=>'finalizado']);
        return redirect()->route('pedidos.pedidosAdmin');//action('PedidosController@index');
    }

    public function show($id){
        $pedido = Pedido::find($id);
        return view('pedidos.show', compact('pedido'));
    }
}
