@extends('layouts.master')
@section('content')
<br>
<br>
<br>
<br>
	<div class="container-contact100">
		<div class="contact100-map" id="google_map" data-map-x="19.332013" data-map-y="-97.9206357" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

		<div class="contact100-more">
			<i class="zmdi zmdi-phone-in-talk"></i>
			01 +52 247 100 0073 
		</div>

		<div class="wrap-contact100">
			<form action="" method="post" class="contact100-form validate-form">
				@csrf
				<span class="contact100-form-title">
					Contáctanos
				</span>
				<div class="wrap-input100 validate-input" data-validate="Nombre requerido">
					<label class="label-input100" for="nombreMensaje">Nombre </label>
					<input class="input100" type="text" name="nombreMensaje"  placeholder="Nombre " value="{{ old('nombreMensaje') }}">
					{!! $errors->first('nombreMensaje','<small>:message</small><br>')!!}
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Email requerido: ejemplo@correo.com">
					<label class="label-input100" for="correoMensaje">Correo Electrónico </label>
					<input class="input100" type="email" name="correoMensaje"  placeholder="Correo donde contáctaremos contigo" value="{{ old('correoMensaje') }}">
					{!! $errors->first('correoMensaje','<small>:message</small><br>')!!}
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100">
					<label class="label-input100" for="telefonoMensaje">Teléfono </label>
					<input class="input100" type="text" name="telefonoMensaje" placeholder="01 +52 240 658 4564" value="{{ old('telefonoMensaje') }}">
					{!! $errors->first('telefonoMensaje','<small>:message</small><br>')!!}
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Mensaje es necesario">
					<label class="label-input100" for="mensaje">Redacta tu mensaje </label>
					<textarea class="input100" name="mensaje" placeholder="Expresate de forma libre" value="{{ old('mensaje') }}"></textarea>
					{!! $errors->first('mensaje','<small>:message</small><br>')!!}
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn btn-dark" type="">
							Enviar
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.google.com.mx/maps/@19.332013,-97.9206357,106m/data=!3m1!1e3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

@endsection