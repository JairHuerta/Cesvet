<?php

namespace App\Http\Controllers;

use App\Mensaje;
use DB;
use Illuminate\Http\Request;

class MensajesController extends Controller
{

     public function index()
    
    {
        //Consulta con QueryBuilder
        //$mascotas = DB::table('mascotas')->get();

        //Consulta con Eloquent
        
        $mensajes = Mensaje::all();
    	return view('mensajes.index',compact('mensajes'));

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
            'nombreMensaje'=>'required',
            'correoMensaje'=>'required',
            'telefonoMensaje'=>'required',
            'mensaje'=>'required'
        ]);

        //Consulta con Eloquent (Insert)
        Mensaje::create($request->all());
        return redirect()->route('mensajes.create');
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
        $mensaje = Mensaje::findOrFail($id);
        return view('mensajes.show', compact('mensaje'));
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Consulta con Query Builder
        // DB::table('messages')->where('id', $id)->delete();

        //Consulta con Eloquent
        Mensaje::findOrFail($id)->delete();

        return redirect()->route('mensajes.index');
    }
}