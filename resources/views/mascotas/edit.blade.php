@extends('layouts.master')

@section('titulo', 'Página de Edición')

@section('content')
<h2 class="text-center">Actualizar cita de Mascota</h2>
<div class="row">
	<div class="col-2"></div>
	<div class="col-8">
	<form action="{{ route('mascotas.update', $mascota->id) }}" method="post" enctype="multipart/form-data">
			@csrf
			{{ method_field('PUT') }}
	<div class="form-group">
	<label for="nombre">Nombre de Mascota</label><br>
	<input class="form-control" type="text" name="nombre" placeholder="Nombre de tu mascota" value="{{ $mascota->nombre }}">
	{!! $errors->first('nombre','<small>:message</small><br>')!!}
	</div>
	<div class="form-group">
	<label for="sexo">Sexo de la Mascota</label><br>
	<select class="form-control" name="sexo" class="form-control col-md-6" value="{{ $mascota->sexo }}">>
          <font face="Calibri">
          <option value=""></option>
          <option value="Hembra" {{ getSelect($mascota->sexo,'Hembra') }}>Hembra</option>
          <option value="Macho" {{ getSelect($mascota->sexo,'Macho') }}>Macho</option>
          </font>
     </select>
	{!! $errors->first('sexo','<small>:message</small><br>')!!}
	</div>

	<div class="form-group">
	<label for="nomDueno">Dueño o Responsable</label><br>
	<input class="form-control" type="text" name="nomDueno" placeholder="Responsable" value="{{ $mascota->nomDueno }}">
	{!! $errors->first('masDueno','<small>:message</small><br>')!!}
	</div>
	<div class="form-group">
	<label for="especie">Especie</label><br>
	<select name="especie" id="especie" class="form-control">
          <font face="Calibri">
          	<option value=""></option>
					<option value="Canino" {{ getSelect($mascota->especie,'Canino') }}>Canino</option>
					<option value="Felino" {{ getSelect($mascota->especie,'Felino') }}>Felino</option>
					<option value="Roedor" {{ getSelect($mascota->especie,'Roedor') }}>Roedor</option>
					<option value="Ave" {{ getSelect($mascota->especie,'Ave') }}>Ave</option>
					<option value="Otro" {{ getSelect($mascota->especie,'Otro') }}>Otro</option>
          </font>
     </select>
	{!! $errors->first('especie','<small>:message</small><br>')!!}
	</div>
	
	<div class="form-group">
    <label for="edad">Edad</label>
   	<input class="form-control" type="number" id="edad" class="form-control col-md-6" name="edad" min="1" max="30" value="{{$mascota->edad}}">
  	{!! $errors->first('edad','<small>:message</small><br>')!!}
  	</div>

	<div class="form-group">
	<label for="amistoso">¿Es amistoso con desconocidos?</label><br>
	<select name="amistoso" id="amistoso" class="form-control">
          <font face="Calibri">
          	<option value=""></option>
  	<option value="Si" {{ getSelect($mascota->amistoso,'Si') }}>Si</option>
  	<option value="No" {{ getSelect($mascota->amistoso,'No') }}>No</option>
	</select>
	{!! $errors->first('amistoso','<small>:message</small><br>')!!}
	</div>

	<div class="form-group">
	<label for="comentarios">Comentarios </label><br>
	<textarea class="form-control" name="comentarios" cols="80" rows="5" placeholder="Ejem... Responde con juguetes, tiende a morder">{{ $mascota->comentarios }}</textarea>
	{!! $errors->first('comentarios','<small>:message</small><br>')!!}
	</div>
	
		<div class="w-100 pb-3"></div>
			<div class="row">
				<div class="col-6">
					<button class="btn btn-success btn-block" type="submit">Actualizar</button>
				</div>
				<div class="col-6">
					<a class="btn btn-secondary btn-block" href="{{ route('mascotas.index') }}">Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</div>
@stop