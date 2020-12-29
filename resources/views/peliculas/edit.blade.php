@extends('layouts.master')
@section('titulo', 'Página de Edición de Peliculas')

@section('content')
<h2 class="text-center">Actualizar Película</h2>
<div class="row">
	<div class="col-2"></div>
	<div class="col-8">
		<form action="{{ route('peliculas.update', $pelicula->id) }}" method="post">
			@csrf
			{{ method_field('PUT') }}
			<div class="form-group">
				<label for="titulo">Título</label>
				<input class="form-control" type="text" name="titulo" id="titulo" value="{{ $pelicula->titulo }}">
				{!! $errors->first('titulo','<p class="pt-2 text-danger">:message</p>') !!}
			</div>
			<div class="form-group">
				<label for="estreno">Año de estreno</label>
				<input class="form-control" type="text" name="estreno" id="estreno" value="{{ $pelicula->estreno }}">
				{!! $errors->first('estreno','<p class="pt-2 text-danger">:message<p>') !!}
			</div>
			<div class="form-group">
				<label for="description">Descripción</label>
				<textarea class="form-control" name="description" id="description" rows="3" style="max-width: 100%; max-height:100px;">{{ $pelicula->description }}</textarea>
				{!! $errors->first('description','<p class="pt-2 text-danger">:message<p>') !!}
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-6">
						<img src="{{ Storage::url($pelicula->portada) }}" alt="">
					</div>
					<div class="col-6">
						<label for="portada">Portada</label>
						<input type="file" name="portada" id="portada">
					</div>
				</div>
				{!! $errors->first('portada','<p class="pt-2 text-danger">:message</p>') !!}
			</div>
			<div class="form-group">
				<label for="genero">Género</label>
				<select name="genero" id="genero" class="form-control">
					<option value=""></option>
					<option value="Comedia" {{ getSelect($pelicula->genero,'Comedia') }}>Comedia</option>
					<option value="Accion" {{ getSelect($pelicula->genero,'Accion') }}>Acción</option>
					<option value="Thriller" {{ getSelect($pelicula->genero,'Thriller') }}>Thriller</option>
					<option value="Documental" {{ getSelect($pelicula->genero,'Documental') }}>Documental</option>
				</select>
				{!! $errors->first('genero','<p class="pt-2 text-danger">:message<p>') !!}
			</div>
			<p >Formatos</p>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="checkbox" name="formato[]" id="formato[]" value="2D" {{ getCheck($pelicula->formatos,"2D") }}>
			  <label class="form-check-label" for="formato[0]">2D</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="checkbox" name="formato[]" id="formato[]" value="3D" {{ getCheck($pelicula->formatos,"3D") }}>
			  <label class="form-check-label" for="formato[1]">3D</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="checkbox" name="formato[]" id="formato[]" value="4D" {{ getCheck($pelicula->formatos,"4D") }}>
			  <label class="form-check-label" for="formato[2]">4D</label>
			</div>
			{!! $errors->first('formato','<p class="pt-2 text-danger">:message<p>') !!}
			<div class="w-100 pb-2">Región</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="region" id="region" value="1"  {{ getRadio($pelicula->region,'nacional') }}>
			  <label class="form-check-label" for="region">
			    Nacional
			  </label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="region" id="region" value="2" {{ getRadio($pelicula->region,'extranjera') }}>
			  <label class="form-check-label" for="region">
			    Extranjera
			  </label>
			</div>

			<div class="w-100 pb-3"></div>
			<div class="row">
				<div class="col-6">
					<button class="btn btn-success btn-block" type="submit">Actualizar</button>
				</div>
				<div class="col-6">
					<a class="btn btn-secondary btn-block" href="{{ route('peliculas.index') }}">Cancelar</a>
				</div>
			</div>

		</form>
	</div>
</div>
@stop