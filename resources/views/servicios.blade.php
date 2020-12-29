@extends('layouts.master')

@section('content')
<hr>
<br><br><br>
 <center><h1>Servicios</h1></center>
<center><div id="myBtnContainer">
  <button class="btng active" onclick="filterSelection('all')"> Todos los Servicios</button>
  <button class="btng" onclick="filterSelection('cesvet')"> Cesvet</button>
  <button class="btng" onclick="filterSelection('especialidades')"> Especialidades</button>
  <button class="btng" onclick="filterSelection('estetica')"> Estetica</button>
  <button class="btng" onclick="filterSelection('tienda')"> Tienda</button>
</div></center>

<!-- Portfolio Gallery Grid -->
<div class="row1">
  <div class="column1 cesvet">
    <div class="content1">
      <img src="{{Storage::url("slider4.jpg")}}" alt="Cesvet" style="width:100%">
      <hr>
      <center><h3>CeSVet</h3>
      <p>Ambiente cómodo para ti y tú mascota</p>
      </center>
    </div>
  </div>
  <div class="column1 cesvet">
    <div class="content1">
      <img src="{{Storage::url("recep12.jpg")}}" alt="Cesvet" style="width:100%">
      <hr>
      <center><h3>Recepción</h3>
      <p>Atención desde la entrada a nuestro establecimiento</p>
      </center>
    </div>
  </div>
  <div class="column1 cesvet">
    <div class="content1">
      <img src="{{Storage::url("cesve2.jpg")}}" alt="Cesvet" style="width:100%">
      <hr>
      <center><h3>Modernidad</h3>
      <p>Detalles con amor a nuestros compañeros animales</p>
      </center>
    </div>
  </div>

  <div class="column1 especialidades">
    <div class="content1">
      <img src="{{Storage::url("consul1.jpg")}}" alt="Especialidades" style="width:100%">
      <hr>
      <center><h3>Consultorios</h3>
      <p>Atención a tu mascota personalizada</p>
      </center>
    </div>
  </div>
  <div class="column1 especialidades">
    <div class="content1">
      <img src="{{Storage::url("espe1.jpg")}}" alt="Especialidades" style="width:100%">
      <hr>
      <center><h3>Vacunación</h3>
      <p>Centro de vacunación especializada</p>
      </center>
    </div>
  </div>
  <!--
  <div class="column1 especialidades">
    <div class="content1">
      <img src="Storage::url("radiogra.jpg")}}" alt="Especialidades" style="width:100%">
      <hr>
      <center><h3>Radiografías</h3>
      <p>Equipos para una revisión más extensa </p>
      </center>
    </div>
  </div> -->
   <!--<div class="column1 especialidades">
    <div class="content1">
      <img src="Storage::url("operacion.jpg")}}" alt="Especialidades" style="width:100%">
      <hr>
      <center><h3>Sala de Operacinoes</h3>
      <p>Todo para emergencias </p>
      </center>
    </div>
  </div> -->

  <div class="column1 estetica">
    <div class="content1">
      <img src="{{Storage::url("estetica2.jpg")}}" alt="Estetica" style="width:100%">
      <hr>
      <center><h3>Cortes de Pelaje</h3>
      <p>Estética de Mascotas </p>
      </center>
    </div>
  </div>
  <div class="column1 estetica">
    <div class="content1">
      <img src="{{Storage::url("estetica3.jpg")}}" alt="Estetica" style="width:100%">
      <hr>
      <center><h3>Limpieza</h3>
      <p>Baños a tu mascota </p>
      </center>
    </div>
  </div>
  <div class="column1 tienda">
    <div class="content1">
      <img src="{{Storage::url("tienda.jpg")}}" alt="Tienda" style="width:100%">
      <hr>
      <center><h3>Tienda</h3>
      <p>Visita nuestra tienda</p>
      </center>
    </div>
  </div>
  <div class="column1 tienda">
    <div class="content1">
      <img src="{{Storage::url("tienda24.jpg")}}" alt="Tienda" style="width:100%">
      <hr>
      <center><h3>Productos</h3>
      <p>Todo lo necesario para todo tipo de mascotas </p>
      </center>
    </div>
  </div>
<!-- END GRID -->
</div> 
<hr>
<div class="row1">
	<center><h1>Agenda una cita</h1></center>
	<div class="column">
    <div class="content">
      <center>
      <a href="{{route('mascotas.create')}}"><img src="{{Storage::url("calen.png")}}"></a>
      <hr>
      <center><h3>Hazlo con tiempo</h3>
      <p>Da click para hacer una cita con nosotros en cualquier servicio </p>
      <a class="btn btn-outline-primary mr-3" href="{{route('mascotas.create')}}">Haz una cita</a>
      </center>
    </div>
</div>
</div>



<script>
filterSelection("all") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column1");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show1");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show1");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btng");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
@endsection