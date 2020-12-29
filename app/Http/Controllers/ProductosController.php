<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Especie;
use App\Productos;
use Illuminate\Http\Request;


class ProductosController extends Controller

{

    public function __construct()
    {
        //$this->middleware('checkAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $productos = Productos::all();
        return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categorias = Categoria::all();
        $especies = Especie::all();
        return view('productos.create', compact('categorias', 'especies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomProducto'=>'required',
            'categoria_id'=>'required',
            'especie_id'=>'required',
            'foto'=>'required|image',
            'costo'=>'required',
            'descripcion'=>'required',
            'existencias'=>'required'
        ]);

        $foto = $request->file('foto')->store('public');//guarda imagen y regresa ubicacion
        $datosInr = $request->except('foto'); //recibe request sin datos Objeto y Array
        $datosInr['foto'] = $foto; //agrega la imagen del servidor al request
        Productos::create($datosInr);

        return redirect()->route('productos.index')->with([
            'mensaje'=>'Producto Guardado',
            'accion'=>'guardar'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Consulta con QueryBuilder
        //$message = DB::table('messages')->where('id', $id)->first();

        //Consulta con Eloquent
        $producto = Productos::findOrFail($id);

        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Consulta con Query Builder
        // $message = DB::table('messages')->where('id', $id)->first();

        //Consulta con Eloquent
        $producto = Productos::findOrFail($id);
        $categorias = Categoria::all();
        $especies = Especie::all();

        return view('productos.edit', compact('producto', 'categorias', 'especies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'nomProducto'=>'required',
            'categoria_id'=>'required',
            'especie_id'=>'required',
            'foto'=>'required|image',
            'costo'=>'required',
            'descripcion'=>'required|min:10',
            'existencias'=>'required'
        ]);

        $producto = Productos::findOrFail($id);
        $foto = $producto->foto;

        $datosInr = $request->except('foto');

        if ($request->hasFile('foto')){
            $foto = $request->file('foto')->store('public');
        }

        $datosInr['foto']=$foto;

        $producto->update($datosInr);

        return redirect()->route('productos.index')->with([
            'mensaje'=>'Producto Editado',
            'accion'=>'editar'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //
        Productos::findOrFail($id)->delete();

        return redirect()->route('productos.index')->with(['mensaje'=>'Se ha dado de baja el producto','accion'=>'eliminar']);
    }
}
