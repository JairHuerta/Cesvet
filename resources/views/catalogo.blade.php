@extends('layouts.master')

@section('content')

<div class="row">  
<div class="container">
        <div class="row">
            <div class="col col-md-12">
                <br><br><br>
                <center><h1>Nuestra Tienda</h1></center>
                <center><h4>Estos productos podrás encontrarlos en la tienda CESVET</h4></center>
                <br>

            <div class="row mt-3">
            <center><a class="btng" href="{{route('home')}}">Mostrar todas</a>
            @foreach($categorias as $categoria)
            <a href="{{ route('catalogo',$categoria->id) }}" class="btng">{{ $categoria->categoria}}</a>
            @endforeach
            <hr>
            <div class="row mt-3">
            @foreach($productos as $producto)
            <div class="col-4">
                <div class="card">
                    <img src="{{ Storage::url($producto->foto)}}" class="card-img-top imf-fluid" alt="">
                    <div class="card-body">
                        <h3 class="card-title">{{$producto->nomProducto}}</h3>
                        <p class="card-text">
                            {{ $producto->descripcion }}
                        </p>
                        <a href="{{ route('productos.show', $producto->id) }}" class="btng">Ver detalles</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</center>
</div>
</div>
</div>
</div>
@endsection