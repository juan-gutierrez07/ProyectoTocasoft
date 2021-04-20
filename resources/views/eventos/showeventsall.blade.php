@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/showevents.css') }}">
@section('content')
<div class="clear">    
<section id="noticias" >
    <br>
    <h1 style="align-self: center; left: 45%;
    position: relative;">Eventos</h1>
    <hr>
    <ul style="margin-left: 8%">
        @foreach ($eventos as $evento)
    <li class="rojo" style="background-image: url(../storage/{{$evento->imagen_location}})">
          <h2> {{ $evento->title }}</h2>
          <a data-toggle="modal" data-target="#Info_{{$evento->id}}" class="boton">Conocer más</a>
        </li>
        <div id="Info_{{$evento->id}}" class="Modal" data-backdrop="static">
                <div class="ModalBox all" style="height: 90%; margin-top: 2%;">
                       <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true" style="right: 40%; position: relative;">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                    <div class="contenido">
                        <div class="box">
                            <img src="../storage/{{ $evento->imagen_location }}" width="100%">
                            <br>
                        </div>
                    <div class="box">
                            <div style="background-color: text-align: center; margin-right: 5%;margin-left: 5%">
                            <h3 style="font-family: Georgia, 'Times New Roman', Times, serif;" class="text-primary">Información</h3>
            
                            <p>
                             {{ $evento->descripcion }}
                            </p>
                            <div >    
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;" class="text-primary">Inicio:</h5> <p>{{ $evento->start }}</p>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;" class="text-primary">Finalización:</h5> <p>{{ $evento->end }}</p>
                            <h5 style="font-family: Georgia, 'Times New Roman', Times, serif;" class="text-primary">Lugar del evento:</h5> <p>{{ $evento->place->name }}</p>
                            <br>
                            </div>
                            <br>
                        </div>
                        <br>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach 
        </ul>
</section>
</div>

<!--Inicia Ventana Modal-->

<!--Termina Ventana Modal-->
@endsection