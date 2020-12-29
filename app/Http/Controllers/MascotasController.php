<?php

namespace App\Http\Controllers;

use App\Mascota;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class MascotasController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consulta con QueryBuilder
        //$mascotas = DB::table('mascotas')->get();

        //Consulta con Eloquent
        
        $mascotas = Mascota::all();
    	return view('mascotas.index',compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //LLamada a la vista formulario
        return view('mascotas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Consulta con Query Builder (Insert)
        // DB::table('messages')->insert([
        //     'nombre' => $request->input('nombre'),
        //     'email' => $request->input('email'),
        //     'asunto' => $request->input('asunto'),
        //     'mensaje' => $request->input('mensaje'),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        $request->validate([
            'nombre'=>'required',
            'sexo'=>'required',
            'nomDueno'=>'required',
            'especie'=>'required',
            'edad'=>'required',
            'servicio'=>'required',
            'cita' => 'required',
            'hora' => 'required',
            'amistoso'=>'required',
            'comentarios'=>'required'
        ]);

        //Consulta con Eloquent (Insert)
        Mascota::create($request->all());
        return redirect()->route('servicios');
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
        $mascota = Mascota::findOrFail($id);

        return view('mascotas.show', compact('mascota'));
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
        $mascota = Mascota::findOrFail($id);

        return view('mascotas.edit', compact('mascota'));
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
        //Consulta con Query Builder
        // $message = DB::table('messages')->where('id', $id)->update([
        //     'nombre' => $request->input('nombre'),
        //     'email' => $request->input('email'),
        //     'asunto' => $request->input('asunto'),
        //     'mensaje' => $request->input('mensaje'),
        //     'updated_at' => Carbon::now()
        // ]);

        //Consulta Utilizando Eloquent
        Mascota::findOrFail($id)->update($request->all());

        return redirect()->route('mascotas.index');
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
        Mascota::findOrFail($id)->delete();

        return redirect()->route('mascotas.index');
    }
}
