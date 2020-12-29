@extends('layouts.master')
@section('content')
<br>
<br>
<br>
<br>
<div class="row mt-3">
			<div class="col">
					<div class="tab-pane" id="tab2" role="tabpanel">
						<div class="row mt-3 justify-content-center">
							<div class="col-9">

								<h1>Pedidos en Proceso</h1>
								<table class="table table-bordered table-responsive-lg">
									<thead>
										<tr class="table-active">
											<th>Detalles de pedido</th>
											<th>IVA</th>
											<th>Total</th>
											<th>Dirección</th>
											<th>Método de Pago</th>
											<th>Estatus</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
										@foreach($pedidosProceso as $pedido)
										<tr>
											<td class="">
												<a href="{{ route('pedidos.show', $pedido->id) }}">Detalles de pedido
												</a>
											</td>
											<td>$ {{ $pedido->iva }}</td>
											<td>$ {{ $pedido->total }}</td>
											<td>{{ $pedido->direccion }}</td>
											<td>{{ $pedido->metodo_pago }}</td>
											<td>{{ $pedido->estatus }}</td>
											<td><a href="{{ route('pedidos.finalizar', $pedido->id) }}" class="btn btn-success">Finalizar</a></td>
										</tr>
										@endforeach
									</tbody>
								</table>

							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab3" role="tabpanel">
						<div class="row mt-3 justify-content-center">
							<div class="col-9">
								<h1>Pedidos Finalizados</h1>
								<table class="table table-bordered">
									<thead>
										<tr class="table-success">
											<th>Id</th>
											<th>IVA</th>
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