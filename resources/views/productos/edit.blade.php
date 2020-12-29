@extends('layouts.master')

@section('titulo', 'Página de Edición')

@section('content')
<br>
<br>
<br>
<br>
<h1 class="text-center">Editar información de producto</h1>
<div class="row justify-content-center">
<form action="{{ route('productos.update', $producto->id ) }}" method="post" enctype="multipart/form-data">
	{!! method_field('PUT') !!}
	@csrf
	<label for="nomProducto">Nombre de Producto</label><br>
	<input type="text" class="form-control" name="nomProducto" id="nomProducto" value="{{ $producto->nomProducto }}">
	{!! $errors->first('nomProducto','<small>:message</small><br>')!!}
	<br>
	<label for="categoria_id">Categoria</label><br>
	<select name="categoria_id" id="categoria_id" class="form-control" value="{{ $producto->categoria }}">

          <option value=""></option>
					@foreach($categorias as $categoria)
						<option value="{{$categoria->id }}"
							{{getSelect(($producto->categoria_id),$categoria->id) }}
							>{{ $categoria->categoria }}</option>
					@endforeach
     </select>
	{!! $errors->first('categoria','<small>:message</small><br>')!!}
	<br>

	<label for="para">Especie</label><br>
	<select name="especie_id" id="especie_id" class="form-control" value="{{ $producto->para }}">

         <option value=""></option>
					@foreach($especies as $especie)
						<option value="{{$especie->id }}"
							{{getSelect(($producto->especie_id),$especie->id) }}
							>{{ $especie->especies }}</option>
					@endforeach
     </select>
	{!! $errors->first('especie','<small>:message</small><br>')!!}
	<br>

	<div class="form-group">
				<label for="foto">Foto</label>
				<img src="{{ Storage::url($producto->foto)}}" alt="" width="300px">
				<input type="file" name="foto" id="foto">
				{!! $errors->first('foto','<p class="pt-2 text-danger">:message<p>') !!}
			</div>

    <label for="costo">Costo</label>
   	<input type="number" class="form-control" step="0.01" value="1" min="1" max="10000" name="costo" id="costo" value="{{ $producto->costo }}">
  

	<label for="descripcion">Descripción </label><br>
	<textarea name="descripcion" id="descripcion" class="form-control" cols="100" rows="5">
		{{ $producto->descripcion }}"</textarea>
	{!! $errors->first('descripcion','<small>:message</small><br>')!!}

	<div class="form-group">
				<label for="existencias">En Existencia</label>
				<input class="form-control" type="number" name="existencias" id="existencias" value="{{ $producto->existencias }}">
				{!! $errors->first('existencias','<p class="pt-2 text-danger">:message<p>') !!}
			</div>
	<br>
	<div class="row">
				<div class="col-6">
					<button class="btn btn-success btn-block" type="submit">Guardar</button>
				</div>
				<div class="col-6">
					<a class="btn btn-secondary btn-block" href="{{ route('productos.index') }}">Cancelar</a>
				</div>
			</div>
	</form>
</div>


@stop