@extends('layouts.master')
@section('titulo', 'Página de Inserción de Peliculas')

@section('content')
<h2 class="text-center">Insertar Película</h2>
<div class="row justify-content-center">
	<div class="col-8">
		<form action="{{ route('peliculas.store') }}" method="post"
		enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="titulo">Título</label>
				<input class="form-control" type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">
				{!! $errors->first('titulo','<p class="pt-2 text-danger">:message</p>') !!}
			</div>
			<div class="form-group">
				<label for="estreno">Año de estreno</label>
				<input class="form-control" type="text" name="estreno" id="estreno" value="{{ old('estreno') }}">
				{!! $errors->first('estreno','<p class="pt-2 text-danger">:message<p>') !!}
			</div>
			<div class="form-group">
				<label for="description">Descripción</label>
				<textarea class="form-control" name="description" id="description" rows="3" style="max-width: 100%; max-height:100px; ">{{ old('description') }}</textarea>
				{!! $errors->first('description','<p class="pt-2 text-danger">:message<p>') !!}
			</div>
			<div class="form-group">
				<label for="portada">Portada</label>
				<input type="file" name="portada" id="portada">
				{!! $errors->first('portada','<p class="pt-2 text-danger">:message</p>') !!}
			</div>
			<div class="form-group">
				<label for="genero_id">Género</label>
				<select name="genero_id" id="genero_id" class="form-control">
					<option value=""></option>
					@foreach($generos as $genero)
						<option value="{{ $genero->id }}"
							{{ getSelect(old('genero'),$genero->genero) }}
							>{{ $genero->genero }}</option>
					@endforeach
				</select>
				{!! $errors->first('genero','<p class="pt-2 text-danger">:message<p>') !!}
			</div>
			<p >Formatos</p>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="checkbox" name="formato[]" id="formato[]" value="2D" {{ getCheck(old('formato'),"2D") }}>
			  <label class="form-check-label" for="formato[0]">2D</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="checkbox" name="formato[]" id="formato[]" value="3D" {{ getCheck(old('formato'),"3D") }}>
			  <label class="form-check-label" for="formato[1]">3D</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="checkbox" name="formato[]" id="formato[]" value="4D" {{ getCheck(old('formato'),"4D") }}>
			  <label class="form-check-label" for="formato[2]">4D</label>
			</div>
			{!! $errors->first('formato','<p class="pt-2 text-danger">:message<p>') !!}
			<div class="w-100 pb-2">Región</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="region" id="region" value="1"  {{ getRadio(old('region'),'1') }}>
			  <label class="form-check-label" for="region">
			    Nacional
			  </label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="region" id="region" value="2" {{ getRadio(old('region'),'2') }}>
			  <label class="form-check-label" for="region">
			    Extranjera
			  </label>
			</div>

			<div class="w-100 pb-3"></div>
			<div class="row">
				<div class="col-6">
					<button class="btn btn-success btn-block" type="submit">Guardar</button>
				</div>
				<div class="col-6">
					<a class="btn btn-secondary btn-block" href="{{ route('peliculas.index') }}">Cancelar</a>
				</div>
			</div>

		</form>
	</div>
</div>
@stop