@extends('layouts.master')
@section('titulo', 'Página de Inserción de Productos')

@section('content')
<br>
<br>
<br>
<br>
<h2 class="text-center">Insertar Producto</h2>
<div class="row justify-content-center">
	<div class="col-8">
		<form action="{{ route('productos.store') }}" method="post"
		enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="nomProducto">Nombre de Producto</label><br>
				<input class="form-control" name="nomProducto" placeholder="Nombre del Producto" value="{{ old('nomProducto') }}" required>
				{!! $errors->first('nomProducto','<p class="pt-2 text-danger">:message</p>') !!}
			</div>

			<div class="form-group">
				<label for="categoria_id">Categoria</label>
				<select name="categoria_id" id="categoria_id" class="form-control">
					<option value=""></option>
					@foreach($categorias as $categoria)
						<option value="{{ $categoria->id }}"
							{{ getSelect(old('categoria'),$categoria->categoria) }}
							>{{ $categoria->categoria }}</option>
					@endforeach
				</select>
				{!! $errors->first('categoria','<p class="pt-2 text-danger">:message<p>') !!}
			</div>

			<div class="form-group">
				<label for="especie_id">Especie</label>
				<select name="especie_id" id="especie_id" class="form-control">
					<option value=""></option>
					@foreach($especies as $especie)
						<option value="{{ $especie->id }}"
							{{ getSelect(old('especie'),$especie->especie) }}
							>{{ $especie->especies }}</option> 
					@endforeach
				</select>
				{!! $errors->first('especie','<p class="pt-2 text-danger">:message<p>') !!}
			</div>

			<div class="form-group">
				<label for="foto">Foto del producto</label>
				<input type="file" name="foto" id="foto">
				{!! $errors->first('foto','<p class="pt-2 text-danger">:message</p>') !!}
			</div>

			<div class="form-group">
				<label for="costo">Costo</label>
				<input class="form-control" type="number" name="costo" id="costo" value="{{ old('costo') }}">
				{!! $errors->first('costo','<p class="pt-2 text-danger">:message<p>') !!}
			</div>
			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<textarea class="form-control" name="descripcion" id="descripcion" rows="3" style="max-width: 100%; max-height:100px; ">{{ old('descripcion') }}</textarea>
				{!! $errors->first('descripcion','<p class="pt-2 text-danger">:message<p>') !!}
			</div>

			<div class="form-group">
				<label for="existencias">En Existencia</label>
				<input class="form-control" type="number" name="existencias" id="existencias" value="{{ old('existencias') }}">
				{!! $errors->first('existencias','<p class="pt-2 text-danger">:message<p>') !!}
			</div>

			
			
			<div class="w-100 pb-3"></div>
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
</div>
@stop


	<!-- <label for="categoria">Categoria</label><br>
	<select name="categoria" class="form-control col-md-6" value="old('categoria')">
          <font face="Calibri">
          <option value="Categoría">Categoría</option>
          <option value="Accesorios">Accesorios</option>
          <option value="Alimentos">Alimentos</option>
          <option value="Medicinas">Medicinas</option>
          <option value="Otros">Otros</option>
          </font>
     </select>

	<label for="para">Especie</label><br>
	<select name="para" class="form-control col-md-6" value=" old('para') ">
          <font face="Calibri">
          <option value="Canino">Canino</option>
          <option value="Felino">Felino</option>
          <option value="Roedor">Roedor</option>
          <option value="Otro">Otro</option>
          </font>
     </select>
	
	<br>
	 -->
