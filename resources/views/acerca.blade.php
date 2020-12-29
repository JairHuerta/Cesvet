@extends('layouts.master')

@section('content')
<hr>
<br>
<br>
<div class="container">
	<h1 align="center">¿Quienes somos?</h1>
	<br><br>
	<img src="{{Storage::url("equipo.jpg")}}" class="rounded mx-auto d-block img-fluid" alt="">
	</center>
</div>
<hr>
<section id="abt_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Acerca de CeSVet</h1>
					<h2>Centro de Servicios Veterinarios</h2>
				</div>			
			</div>		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="abt">
					<p class="h3">Somos un equipo multidiciplinario de Medicos Veterinarios y personal capacitado para la atención integral de las mascotas, con el fin de reestablecer, mejorar y preservar su salud, así como prevenir y evitar las enfermedades que puedan adquirir. Esto a través de una atención de calidad, humanismo, compromiso y honradez de los servicios, con recursos adecuados para garantizar el bienestar animal y la satisfacción humana.</p>
				</div>
			</div>			
		</div>
	</div>
</section>

<section>
<div class="container">
		<div class="row">
			<div class="col col-md-12">
				<br><br><br>
				<div class="title_sec">
				<h1>¿Quienes integramos a Cesvet?</h1>
				<hr>
				<h2>Nuestro Personal a tus Servicios</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
  				<div class="column2">
    			<div class="card2" align="center">
      	<img src="{{Storage::url("avatar3.png")}}" class="img-equipo" alt="Equipo" style="width:50%">
      			<div class="container2">
        			<h3>M.V.Z. Hector Miguel Hdez. Hdez.</h3>
        			<p class="title2">Dueño &amp; Veterinario en Jefe</p>
        			<p>Dueño y Veterinario a tu servicio</p>
        			<p>hector.mhh@gmail.com</p>
    			</div>
    		</div>
		</div>
      

  <div class="column2">
    <div class="card2" align="center">
      <img src="{{Storage::url("avatar2.png")}}" class="img-equipo" alt="Equipo" style="width:50%">
      <div class="container2">
        <h3>M.V.Z. Claudia Espejel Saldaña</h3><br>
        <p class="title2">Veterinaria</p>
        <p>Especialista en Rx., Fracturasm.</p>
        <p>claudia_espejel08@gmail.com</p>
        </div>
      </div>
    </div>
  

  <div class="column2">
    <div class="card2" align="center">
      <img src="{{Storage::url("avatar4.png")}}" class="img-equipo" alt="Equipo" style="width:50%">
      <div class="container2">
        <h3>M.V.Z Carmen Anastacio Romano</h3>
        <p class="title2">Veterinaria</p>
        <p>Encargada de Traumatismo y Estética</p>
        <p>karmen.gonaro@gmail.com</p>
         </div>
      </div>
    </div>
  </div>
</section>
<section>
		

</section>

@endsection