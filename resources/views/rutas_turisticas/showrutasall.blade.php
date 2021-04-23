@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/showrutas.css') }}">
@section('content')
<div class="clear">
        @include('establecimientos.message')    
<section id="noticias" >
    <br>
    <h1 style="align-self: center; left: 15%;
    position: relative;">Rutas Turisticas</h1>
    <hr>
    <ul style="margin-left: 25%">
        @foreach ($rutas as $ruta)
    <li class="rojo" style="background-image: url(../storage/{{$ruta->imagen_principal}})">
                <h2> {{ $ruta->name }}</h2>
                <a href="{{ route('ruta.view',$ruta->id) }}">Visita la ruta</a>
            </li>
        @endforeach    
    </ul>
</section>
</div>

<!--Inicia Ventana Modal-->

<!--Termina Ventana Modal-->
@endsection