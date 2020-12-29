@extends('layouts.master')
@section('titulo', 'Listado de Peliculas')

@section('content')
<h1>Listado de Peliculas</h1>
{{-- Mensajes opcionales en interts y updates --}}
<hr>
<div class="row">
	<div class="col-4">
		<a href="{{ route('peliculas.create') }}" class="btn btn-primary btn-block">Nuevo</a>
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
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Título</th>
			<th>Año de estreno</th>
			<th>Descripción</th>
			<th>Portada</th>
			<th>Genero</th>
			<th>Formato(s)</th>
			<th>Región</th>
			@guest
			@else
			<th>Acciones</th>
			@endguest
		</tr>
	</thead>
	<tbody>
		@foreach($peliculas as $pelicula)
		<tr>
			<td>
				<a href="{{ route('peliculas.show', $pelicula->id) }}">
					{{ $pelicula->titulo }}
				</a>
			</td>
			<td>{{ $pelicula->estreno }}</td>
			<td>{{ $pelicula->description }}</td>
			<td>
				<img src="{{ Storage::url($pelicula->portada) }}" alt="" width="150px">
			</td>
			<td>{{ $pelicula->genero->genero }}</td>
			<td>{{ $pelicula->formato }}</td>
			<td>{{ $pelicula->region }}</td>
			@guest
			@else
			<td >
				<a href="{{ route('peliculas.edit', $pelicula->id) }}" class="col-6 btn btn-warning border-info btn-sm">Editar</a>
				<form class="d-inline" action="{{ route('peliculas.destroy', $pelicula->id) }}" method="post">
					@csrf
					{!! method_field('DELETE') !!}
					<button type="submit" onclick="" class="btn btn-danger btn-sm">Eliminar</button>
				</form>
			</td>
			@endguest
		</tr>
		@endforeach
	</tbody>
</table>
@stop