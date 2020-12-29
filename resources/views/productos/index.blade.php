@extends('layouts.master')
@section('titulo', 'Listado de productos')

@section('content')
<br>
<br>
<br>
<br>
<h1 class="text-center">Listado de Productos</h1>
{{-- Mensajes opcionales en interts y updates --}}
<hr>
<div class="row">
	<div class="col-4">
		<a href="{{ route('productos.create') }}" class="btn btn-primary btn-block">Nuevo Producto</a>
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
			<th>Producto</th>
			<th>Categoria</th>
			<th>Especie</th>
			<th>Vista</th>
			<th>Costo</th>
			<th>Descripción</th>
			<th>Existencia</th>
			@guest
			@else
			<th>Acciones</th>
			@endguest
		</tr> 
	</thead>
	<tbody>
		@foreach($productos as $producto)
		<tr>
			<td>
				<a href="{{ route('productos.show', $producto->id) }}">
					{{ $producto->nomProducto }}
				</a>
			</td>
			<td>{{ $producto->categoria->categoria }}</td>
			<td>{{ $producto->especie->especies }}</td>
			<td>
				<img src="{{ Storage::url($producto->foto)}}" alt="" width="300px">
			</td>
			<td>$ {{ $producto->costo }}</td>
			<td>{{ $producto->descripcion}}</td>
			<td>{{ $producto->existencias}}</td>
			@guest
			@else
			<td >
				<a href="{{ route('productos.edit', $producto->id) }}" class="col-6 btn btn-warning border-info btn-sm">Editar</a>
				<form class="d-inline" action="{{ route('productos.destroy', $producto->id) }}" method="post">
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