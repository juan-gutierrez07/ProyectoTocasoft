@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/comentarios.css') }}">
@endsection
@section('content')
<div class="row align-items-start">
    <div class="col-md-4 order-1" id="contenedor" style="right:20%;">
        
        <aside>
            <div class="p-4 bg-light" style="margin-top: 40%; text-align: center; border-radius: 4px">
                    <img style="width: 150px; height: 150px;
                    border-radius: 50%;
                    margin-top: 30px;" src="../../storage/{{ $comentarios[0]->place->imagen_principal }}" alt="Location">
                    <h3 class="my-4" style="font-size: 18px;
                    color: #407587;
                    margin-bottom: 15px;" > Total de comentarios del {{ $comentarios[0]->place->name }}:</h3>
                    <span>---</span>
                    <h3 class="my-4" style="font-size: 18px;
                    color: #407587;
                    margin-bottom: 15px;" > Puntuación promedio del {{ $comentarios[0]->place->name }}:</h3>
                    <form action="" method="">
                    <a href="" class=" btn btn-primary my-4">Realizar comentario</a>
                    </form>
            </div>
        </aside>
    </div>   
    @foreach ($comentarios as $comentario)
    <div class="col-md-8 order-2" style="right: 16%;">    
        <div class="container-comments my-5">
            <div class="comments" style="margin-top: 20%;">
                    <legend  class="text-primary">Comentarios sobre {{ $comentario->place->name }} </legend>
                 <div class="photo-perfil">
                     {{-- <img src="image/perfil.png" alt=""> --}}
                 </div>
                 <div class="info-comments" style="width: 160%;">
                     <div class="header">
                         <h4>{{ $comentario->user->name }}</h4>
                         <h5>25 noviembre 2017</h5>
                     </div>
                     <p>{{ $comentario->content }}</p>
                     <div class="footer">
                         {{ $comentario->points }}
                     </div>
                 </div>
             </div>
         </div>
    @endforeach
    </div>
</div>    
@endsection
@section('styles')
    <style>

    </style>
@endsection