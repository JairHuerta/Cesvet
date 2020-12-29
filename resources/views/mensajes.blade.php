@extends('layouts.master')
@section('content')

@section('content')
<br><br><br><br>
<h1 class="text-center">Listado de mensajes</h1>
{{-- Mensajes opcionales en interts y updates --}}
<hr>

<hr>
<table class="table table-bordered table-striped table-responsive-lg">
	<thead>
		<tr>
			<th>Nombre de Cliente</th>
			<th>Correo de Contácto</th>
			<th>Teléfono</th>
			<th>Mensaje</th>
			<th>Acciones</th>
		</tr>
	</thead>
		<tr>
			<td>Gerardo</td>
			<td>gera_pekka@gmail.com</td>
			<td>2461217533</td>
			<td>Mensaje de prueba</td>			
			<td>
				<form class="d-inline" action="#" method="post">
					<button type="submit" onclick="" class="btn btn-danger btn-sm">Eliminar</button>
				</form>
			</td>
		</tr>
		<!--endforeach-->
	</tbody>
</table>

@endsection
