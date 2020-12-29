@extends('layouts.master')

@section('titulo', 'Detalles de pedido')

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
				<p>Costo de la compra{{ $pedido->total }}</p>
				<p>Dirección del cliente {{ $pedido->direccion }}</p>
				<p>Metodo de pago: {{ $pedido->metodo_pago }}</p>
				<p>IVA: {{ $pedido->iva }}</p>
				<p>Estatus del pedido:{{ $pedido->estatus }}</p>
				<br>
				{{--<ul>
					@foreach($pelicula->formatos as $formato)
					<li>{{ $formato }}</li>
					@endforeach
				</ul>--}}
				<form action="{{ route('pedidos.add') }}" method="post">
					@csrf
					<div class="form-group">
					<label for="cantidad">Cantidad de unidades</label>
		<br>
	</div>
</form>
				<a href="{{ route('pedidos.pedidosAdmin') }}" class="btn btn-secondary">Regresar</a>
			</div>
		</div>
	</div>
</div>
@stop