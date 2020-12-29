@extends('layouts.master')
@section('content')
<br>
<br>
<br>
<br>
<div class="row mt-3">
			<div class="col">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a href="#tab1" class="nav-link active" data-toggle="tab">Pedido Actual</a>
					</li>
					<li class="nav-item">
						<a href="#tab2" class="nav-link" data-toggle="tab">En Proceso</a>
					</li>
					<li class="nav-item">
						<a href="#tab3" class="nav-link" data-toggle="tab">Finalizados</a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="tab1" role="tabpanel">
						<div class="row mt-3 justify-content-center">
							<div class="col-9">
								<h1>Pedido Actual</h1>
								<hr>
								<table class="table table-bordered table-responsive-lg">
									<tr>
										<th>Producto</th>
										<th>Precio Unitario</th>
										<th>Cantidad</th>
										<th>Total</th>
										<th>Acciones</th>
									</tr>
									<tbody>
									@php
										$totalAcumulado = 0;
									@endphp
									@foreach($pedido->productos as $producto)
									<tr>
										<td>{{ $producto->nomProducto.' '.$producto->descripcion }}</td>
										<td>{{ $producto->costo }}</td>
										<td>
											<form action="{{ route('pedidos.sumar') }}" method="post">
												@csrf
												<input type="hidden" name="id_p" value="{{ $producto->id }}"required>
												<input type="hidden" name="cantidadP" value="{{$producto->pivot->cantidad}}">
												<input type="number" name="cantidad" id="cantidad" value="{{ $producto->pivot->cantidad }}"required>
												<button type="submit" class="btn btn-secondary">Actualizar</button>
											</form>
										</td>
										<td>{{ ($producto->costo )*($producto->pivot->cantidad) }}</td>
										@php
											$totalAcumulado += (($producto->costo)*($producto->pivot->cantidad))
										@endphp
										<td>
											<a href="{{ route('pedidos.quita', $producto->id) }}" class="btn btn-warning">Eliminar</a>
										</td>
									</tr>
									@endforeach
									</tbody>
								</table>
								<hr>
								<p class="text-right">IVA: {{ $totalAcumulado*.16 }}</p>
								<p class="text-right">TOTAL: {{ $totalAcumulado*1.16 }}</p>
								<form action="{{ route('pedidos.store') }}" method='post'>
									@csrf
									<input type="hidden" name="iva" value="{{ $totalAcumulado*.16 }}">
									<input type="hidden" name="total" value="{{ $totalAcumulado*1.16 }}">
									<div class="form-group">
										<label for="direccion">Ingresa Dirección</label>
										<input type="text" name="direccion" class="form-control">
									</div>
									<div class="form-group">
										<label for="metodo_pago">Método de Pago</label>
										{{--<input type="text" name="metodo_pago" class="form-control">--}}
										<select name="metodo_pago" id="metodo_pago" class="form-control">
											<option></option>
											<option>Tarjeta de credito</option>
											<option>Deposito</option>
										</select>
									</div>
									{{--<button type="submit" class="btn btn-primary">Comprar</button>--}}
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Confirmar</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirma tus productos antes de hacer la compra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Revisa tu carrito antes de realizar la compra <br>
        Datos del usuario: 
        <p>Nombre de usuario: {{$pedido->user->name}}</p>
        <p>Tus compras son las siguientes:</p>
        <table class="table table-bordered">
        	<tr>
										<th>Producto</th>
										<th>Precio Unitario</th>
										<th>Cantidad</th>
										<th>Total</th>
									</tr>
									<tbody>
									@php
										$totalAcumulado = 0;
									@endphp
									@foreach($pedido->productos as $producto)
									<tr>
										<td>{{ $producto->nomProducto.' '.$producto->descripcion }}</td>
										<td>{{ $producto->costo }}</td>
										<td>
											<form action="{{ route('pedidos.sumar') }}" method="post">
												@csrf
												<input type="hidden" name="id_p" value="{{ $producto->id }}">
												<input type="number" name="costo" id="costo" value="{{ $producto->pivot->cantidad }}">
											</form>
										</td>
										<td>{{ ($producto->costo )*($producto->pivot->cantidad) }}</td>
										@php
											$totalAcumulado += (($producto->costo)*($producto->pivot->cantidad))
										@endphp
										
									</tr>
									@endforeach
									</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Comprar</button>
      </div>
    </div>
  </div>
</div>
								</form>

							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab2" role="tabpanel">
						<div class="row mt-3 justify-content-center">
							<div class="col-9">

								<h1>Pedidos en Proceso</h1>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Id</th>
											<th>Iva</th>
											<th>Total</th>
											<th>Dirección</th>
											<th>Método de Pago</th>
											<th>Estatus</th>
										</tr>
									</thead>
									<tbody>
										@foreach($pedidosProceso as $pedido)
										<tr>
											<td>
												<a href="#">
												{{ $pedido->id }}
												</a>
											</td>
											<td>{{ $pedido->iva }}</td>
											<td>{{ $pedido->total }}</td>
											<td>{{ $pedido->direccion }}</td>
											<td>{{ $pedido->metodo_pago }}</td>
											<td>{{ $pedido->estatus }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>

								<input type="hidden" name="iva" value="{{ $totalAcumulado*.16 }}">
									<input type="hidden" name="total" value="{{ $totalAcumulado*1.16 }}">
									<div class="form-group">

							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab3" role="tabpanel">
						<div class="row mt-3 justify-content-center">
							<div class="col-9">
								<h1>Pedidos Finalizados</h1>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Id</th>
											<th>Iva</th>
											<th>Total</th>
											<th>Dirección</th>
											<th>Método de Pago</th>
											<th>Estatus</th>
										</tr>
									</thead>
									<tbody>
										@foreach($pedidosFinalizados as $pedido)
										<tr>
											<td>
												<a href="#">
												{{ $pedido->id }}
												</a>
											</td>
											<td>{{ $pedido->iva }}</td>
											<td>{{ $pedido->total }}</td>
											<td>{{ $pedido->direccion }}</td>
											<td>{{ $pedido->metodo_pago }}</td>
											<td>{{ $pedido->estatus }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection