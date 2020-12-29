@extends('layouts.master')

@section('titulo', 'Muestra Película')

@section('content')
<div class="row justify-content-center">
	<div class="col-lg-8 col-">
		<div class="card">
			<div class="card-header">
				<h1 class="card-title">Detalles de Película</h1>
			</div>
			<div class="card-body">
				<p>Nombre: {{ $pelicula->titulo }}</p>
				<p>Año de estreno: {{ $pelicula->estreno }}</p>
				<p>Descripción: {{ $pelicula->description }}</p>
				<p>Genero: {{ $pelicula->genero_id }}</p>
				Formatos:
				<br>
				<ul>
					@foreach($pelicula->formatos as $formato)
					<li>{{ $formato }}</li>
					@endforeach
				</ul>
				<p>Película {{ $pelicula->region }}</p>
				<a href="{{ route('peliculas.index') }}" class="btn btn-secondary">Regresar</a>
			</div>
		</div>
	</div>
</div>
@stop