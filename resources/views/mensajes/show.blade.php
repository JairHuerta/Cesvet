@extends('layouts.master')

@section('titulo', 'Muestra Mensaje')

@section('content')
<h1>Mensaje Recibido</h1>
<h2>Nombre : {{ $mensaje->nombreMensaje }} </h2>
<h3>Correo: {{ $mensaje->correoMensaje }}</h3>

@stop