@extends('layouts.master')

@section('titulo', 'Citas agendadas')

@section('content')

<br><br><br><br>
<h1 class="text-center">Listado de citas agendadas</h1>
{{-- Mensajes opcionales en interts y updates --}}

<hr>
<div class="row">
	<div class="col-4">
		<a href="{{ route('mascotas.create') }}" class="btn btn-primary btn-block">Nuevo</a>
	</div>
</div>
@if(session()->get('accion'))
	<hr>
	<div class="alert
		{{ session()->get('accion')=='guardar'? 'alert-success':'' }}
		{{ session()->get('accion')=='editar'? 'alert-primary':'' }}
		{{ session()->get('accion')=='eliminar'? 'alert-danger':'' }}"
		>
		{{ session()->get('mensaje') }}
	</div>
@endif
<hr>
<table class="table table-bordered table-striped table-responsive-lg">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Sexo</th>
			<th>Responsable</th>
			<th>Especie</th>
			<th>Edad</th>
			<th>Día de Cita</th>
			<th>Hora de Cita</th>
			<th>Es amistoso</th>
			<th>Comentarios</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($mascotas as $mascota)
		<tr>
			<td>
				<a href="{{ route('mascotas.show', $mascota->id) }}">
					{{ $mascota->nombre }}</td>
				</a>
			<td>{{ $mascota->sexo }}</td>
			<td>{{ $mascota->nomDueno }}</td>
			<td>{{ $mascota->especie }}</td>
			<td>{{ $mascota->edad }}</td>
			<td>{{ $mascota->cita }}</td>
			<td>{{ $mascota->hora }}</td>
			<td>{{ $mascota->amistoso }}</td>
			<td>{{ $mascota->comentarios }}</td>
			<td >
				<a href="{{ route('mascotas.edit', $mascota->id) }}" class="col-6 btn btn-warning border-info btn-sm">Editar</a>
				<form class="d-inline" action="{{ route('mascotas.destroy', $mascota->id) }}" method="post">
					@csrf
					{!! method_field('DELETE') !!}
					<button type="submit" onclick="" class="btn btn-danger btn-sm">Eliminar</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<br>
<br>
<br>
<br>
@stop