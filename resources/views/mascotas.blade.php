@extends('/layouts.master')

@section('titulo', 'Registro de Mascota')
@section('content')
<h2>Registra a tu Mascota</h2>

@if(session()->has('info'))
	<h3>{{ session('info') }}</h3>
@else
<form action="{{ route('mascotas.store') }}" method="post">
	@csrf
	<label for="nombre">Nombre de Mascota</label><br>
	<input type="text" name="nombre" placeholder="Nombre de tu mascota" value="{{ old('nombre') }}">
	{!! $errors->first('nombre','<small>:message</small><br>')!!}
	<br>
	<label for="sexo">Sexo de la Mascota</label><br>
	<select name="sexo" class="form-control col-md-6" value="{{ old('sexo') }}">
          <font face="Calibri">
          
          <option value="Hembra">Hembra</option>
          <option value="Macho">Macho</option>
          </font>
     </select>
	{!! $errors->first('sexo','<small>:message</small><br>')!!}
	<br>
	<label for="nomDueno">Dueño o Responsable</label><br>
	<input type="text" name="nomDueno" placeholder="Responsable" value="{{ old('nomDueno') }}">
	{!! $errors->first('masDueno','<small>:message</small><br>')!!}
	<br>
	<label for="especie">Especie</label><br>
	<select name="especie" class="form-control col-md-6" value="{{ old('especie') }}">
          <font face="Calibri">
          <option value="Canino">Canino</option>
          <option value="Felino">Felino</option>
          <option value="Roedor">Roedor</option>
          <option value="Otro">Otro</option>
          </font>
     </select>
	{!! $errors->first('especie','<small>:message</small><br>')!!}
	<br>
	<label for="servicio">Tipo de Servicio</label><br>
	<select name="servicio" id="servicio" class="form-control col-md-6" value="{{ old('servicio') }}">
          <font face="Calibri">
          <option value="Consulta">Consulta</option>
          <option value="Estética">Estética</option>
          <option value="Cirugía">Cirugía</option>
          <option value="Radiografía">Radiografía</option>
          <option value="Vacunación">Vacunación</option>
          </font>
     </select>
	{!! $errors->first('servicio','<small>:message</small><br>')!!}

    <label for="edad">Edad</label>
   	<input type="number" class="form-control col-md-6" name="edad" value="1" min="1" max="30" value="{{ old('edad') }}">
  	{!! $errors->first('edad','<small>:mascotas</small><br>')!!}

	<label for="amistoso">¿Es amistoso con desconocidos?</label><br>
	<select name="amistoso" class="form-control col-md-6" value="{{ old('amistoso') }}">
  	<option value="Si">Si</option>
  	<option value="No">No</option>
	</select>

	<label for="comentarios">Comentarios </label><br>
	<textarea name="comentarios" cols="80" rows="5" placeholder="Ejem... Responde con juguetes, tiende a morder">{{ old('comentarios') }}</textarea>
	{!! $errors->first('comentarios','<small>:message</small><br>')!!}
	<br>
	<button class="btn btn-info btn-lg" type="submit" value="Enviar">Registrar</button>
</form>
@endif
@stop