@extends('layouts.master')

@section('titulo', 'Muestra Mensaje')

@section('content')
<div class="row d-flex align-content-center">
  <div class="col-lg-2 col-md-3 col-sm-12"></div>
	<div class="col-lg-8 col-md-6 col-sm-12">
		<div class="card">
			<div class="card-header">
				<h1 class="card-title">Detalles de la cita</h1>
			</div>
				<h1>Mensaje Recibido</h1>
				<h2>Nombre de la Mascota: {{ $mascota->nombre }} </h2>
				<h3>Sexo: {{ $mascota->sexo }}</h3>
				<h3>Dueño o Responsable: {{ $mascota->nomDueno }}</h3>
				<h4>De especie: {{ $mascota->especie }}</h4>


				<button type="button" class="btn btn-success btn-outline btn-icon" onclick="window.print();">Descargar comprobante</button>
			</div>
		</div>
	</div>	
@stop