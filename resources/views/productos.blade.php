@extends('/layouts.master')

@section('titulo', 'Registro de Producto')
@section('content')
<h2>Registra de producto</h2>

@if(session()->has('info'))
	<h3>{{ session('info') }}</h3>
@else
<form action="{{ route('productos') }}" method="post">
	@csrf
	<label for="nomProducto">Nombre de Producto</label><br>
	<input type="text" name="nomProducto" placeholder="Nombre del Producto" value="{{ old('nomProducto') }}">
	{!! $errors->first('nomProducto','<small>:message</small><br>')!!}
	<br>
	<label for="categoria">Categoria</label><br>
	<select name="categoria" class="form-control col-md-6" value="{{ old('categoria') }}">
          <font face="Calibri">
          <option value="Categoría">Categoría</option>
          <option value="Accesorios">Accesorios</option>
          <option value="Alimentos">Alimentos</option>
          <option value="Medicinas">Medicinas</option>
          <option value="Otros">Otros</option>
          </font>
     </select>
	{!! $errors->first('categoria','<small>:message</small><br>')!!}
	<br>

	<label for="para">Especie</label><br>
	<select name="para" class="form-control col-md-6" value="{{ old('para') }}">
          <font face="Calibri">
          <option value="Canino">Canino</option>
          <option value="Felino">Felino</option>
          <option value="Roedor">Roedor</option>
          <option value="Otro">Otro</option>
          </font>
     </select>
	{!! $errors->first('para','<small>:message</small><br>')!!}
	<br>

    <label for="costo">Costo</label>
   	<input type="number" class="form-control col-md-6" step="0.01" value="1" min="1" max="10000" name="costo" value="{{ old('costo') }}">
  

	<label for="descripcion">Descripción </label><br>
	<textarea name="descripcion" cols="100" rows="5" placeholder="Ejem... Correa talla M de color rojo">{{ old('descripcion') }}</textarea>
	{!! $errors->first('descripcion','<small>:message</small><br>')!!}
	<br>
	<button class="btn btn-info btn-lg" type="submit" value="Enviar">Registrar</button>
</form>
@endif
@stop