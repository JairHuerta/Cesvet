@extends('layouts.master')

@section('content')
<br><br>
<hr>
<br><br>

<div class="row">

<div class="column2">
  <div class="card2" align="center">
  <h3>Inventario de productos</h3>
  <p class="title2">Administrador</p>
  <p>Registro de productos en inventario</p>
  <p><a href="{{ route('productos.index') }}" class="btn btn-success btn-block">Ver Producto</a></p>
  </div>
</div>

<div class="column2">
  <div class="card2" align="center">
  <h3>Dar de alta Producto</h3>
  <p class="title2">Administrador</p>
  <p>Apartado para dar de alta un producto al catálogo</p>
  <p><a href="{{ route('productos.create') }}" class="btn btn-secondary btn-block">Nuevo Productos</a></p>
  </div>
</div>

<div class="column2">
   <div class="card2" align="center">
  <h3>Ver Citas</h3>
  <p class="title2">Administrador</p>
  <p>Apartado para mostrar citas de para consulta medica</p>
  <p><a href="{{ route('mascotas.index') }}" class="btn btn-success btn-block">Ver Citas</a></p>
</div>
</div>

<!--<div class="column2">
   <div class="card2" align="center">
  <h3>Ver Pedidos</h3>
  <p class="title2">Administrador</p>
  <p>Apartado para mostrar los pedidos de los clientes</p>
  <p><a href="#" class="btn btn-primary btn-block">Ver Pedidos</a></p>
</div>
</div>-->

<div class="column2">
   <div class="card2" align="center">
  <h3>Ver Mensajes</h3>
  <p class="title2">Administrador</p>
  <p>Apartado para mostrar los mensajes de los clientes</p>
  <p><a href="{{ route('mensajes')}}" class="btn btn-secondary btn-block">Ver Mensajes</a></p>
</div>
</div>
<br><br><br>
<br>
<br>
<br>
<br>
</div>


@endsection