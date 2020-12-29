@extends('layouts.master')

@section('titulo', 'Producto')

@section('content')
<br><br><br>
<div class="row d-flex align-content-center">
	<div class="col-lg-2 col-md-3 col-sm-12"></div>
	<div class="col-lg-8 col-md-6 col-sm-12">
		<div class="card">
			<div class="card-header">
				<h1 class="card-title">Detalles de Producto</h1>
			</div>
			<div class="card-body">
				<p><img src="{{ Storage::url($producto->foto) }}" alt="" width="250px"></p>
				<p class="h1"> {{ $producto->nomProducto }}</p>
				<p>Tipo de categorias: {{ $producto->categoria->categoria }}</p>
				<p>Animal: {{ $producto->especie->especie }}</p>
				<p>Breve descripción: {{ $producto->descripcion }}</p>
				<p>Unidades en Existencia: {{ $producto->existencias }}</p>
				<p>Costo unitario: $ {{ $producto->costo }}</p>
				<br>
				{{--<ul>
					@foreach($pelicula->formatos as $formato)
					<li>{{ $formato }}</li>
					@endforeach
				</ul>--}}
				<p>Este producto podrás adquirirlo en la tienda CESVET</p>
				<a href="{{ route('catalogo') }}" class="btn btn-secondary">Regresar</a>
			</div>
		</div>
	</div>
</div>
@stop