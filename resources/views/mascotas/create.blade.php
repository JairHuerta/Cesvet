@extends('layouts.master')

@section('titulo', 'Página de Contacto')

@section('content')
<br><br><br><br>
<h2 class="text-center">Agenda tu cita de tu mascota</h2>
@if(session()->has('info'))
	<h3>{{ session('info') }}</h3>
@else
<form action="{{ route('mascotas.store') }}" method="post">
	@csrf
	<div class="row">
	<div class="col-2"></div>
	<div class="col-8">
	<div class="form-group">
	<label for="titulo">Nombre de Mascota</label>
	<input class="form-control" type="text" name="nombre"  placeholder="Nombre de tu mascota" value="{{ old('nombre') }}">
	{!! $errors->first('nombre','<small>:message</small><br>')!!}
	</div>
	<div class="form-group">
	<label for="sexo">Sexo de la Mascota</label><br>
	<select class="form-control" name="sexo" id="sexo" class="form-control col-md-6" value="{{ old('sexo') }}">
          <font face="Calibri">
          <option value="Hembra">Hembra</option>
          <option value="Macho">Macho</option>
          </font>
     </select>
	{!! $errors->first('sexo','<small>:message</small><br>')!!}
	</div>
	<div class="form-group">
	<label for="nomDueno">Dueño o Responsable</label><br>
	<input class="form-control" type="text" name="nomDueno" id="" placeholder="Responsable" value="{{ old('nomDueno') }}">
	{!! $errors->first('masDueno','<small>:message</small><br>')!!}
	</div>
	<label for="especie">Especie</label><br>
	<select name="especie" id="especie" class="form-control col-md-6" value="{{ old('especie') }}">
          <font face="Calibri">
          <option value="Canino">Canino</option>
          <option value="Felino">Felino</option>
          <option value="Roedor">Roedor</option>
          <option value="Ave">Ave</option>
          <option value="Otro">Otro</option>
          </font>
     </select>
	{!! $errors->first('especie','<small>:message</small><br>')!!}

	<div class="form-group">
    <label for="edad">Edad</label>
   	<input class="form-control" type="number" id="edad" class="form-control col-md-6" name="edad" value="1" min="1" max="30" value="{{ old('edad') }}">
  	{!! $errors->first('edad','<small>:mesagge</small><br>')!!}
    </div>
	<div class="form-group">
		<label for="servicio">Tipo de Servicio</label><br>
	<select name="servicio" id="servicio" class="form-control col-md-6" value="{{ old('servicio') }}">
          <font face="Calibri">
          <option value=""></option>
          <option value="Consulta">Consulta</option>
          <option value="Estética">Estética</option>
          <option value="Cirugía">Cirugía</option>
          <option value="Radiografía">Radiografía</option>
          <option value="Vacunación">Vacunación</option>
          </font>
     </select>
	{!! $errors->first('servicio','<small>:message</small><br>')!!}

		
	</div>
    <div class="form-group">
    <label for="cita">Dia de Cita</label>
   	<input class="form-control" type="date" id="datemas" class="form-control col-md-6" name="cita" value="{{ old('cita') }}">
  	{!! $errors->first('cita','<small>:mesagge</small><br>')!!}
    </div>
    
    <div class="form-group">
    <label for="edad">Hora</label>
   	<input class="form-control time" type="time" id="hora" class="form-control col-md-6" name="hora" value="{{ old('hora') }}">
  	{!! $errors->first('hora','<small>:mesagge</small><br>')!!}
    </div>

	<div class="form-group">
	<label for="amistoso">¿Es amistoso con desconocidos?</label><br>
	<select class="form-control" name="amistoso" class="form-control col-md-6" value="{{ old('amistoso') }}">
  	<option value="Si">Si</option>
  	<option value="No">No</option>
	</select>
	</div>

	<div class="form-group">
	<label for="comentarios">Comentarios </label><br>
	<textarea class="form-control" name="comentarios" cols="80" rows="5" placeholder="Ejem... Responde con juguetes, tiende a morder">{{ old('comentarios') }}</textarea>
	{!! $errors->first('comentarios','<small>:message</small><br>')!!}
	</div>
	<div class="w-100 pb-3"></div>
			<div class="row">
				<div class="col-6">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">Agendar cita</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Su cita a sido agendada con éxito
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" type="submit">Guardar</button>
      </div>
    </div>
  </div>
</div>
				</div>
				<div class="col-6">
					<a class="btn btn-secondary btn-block" href="{{ route('servicios') }}">Cancelar</a>
				</div>
			</div>
	</form>
	</div>
</div>

@endif
@stop