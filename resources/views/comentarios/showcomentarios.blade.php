@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/comentarios.css') }}">
@endsection
@section('content')
<div class="row align-items-start">
    <div class="col-md-4 order-1" id="contenedor" style="right:20%;">
        <aside>
            <div class="p-4 bg-light" style="text-align: center; border-radius: 4px">
                <img style="width: 150px; height: 150px;
                    border-radius: 50%;
                    margin-top: 30px;" src="../../storage/{{ $comentarios[0]->place->imagen_principal }}" alt="Location">
                <h3 class="my-4" style="font-size: 18px;
                    color: #407587;
                    margin-bottom: 15px;" > Total de comentarios del {{ $comentarios[0]->place->name }}:</h3>
                    <h3>{{ $total }}</h3>
                <h3 class="my-4" style="font-size: 18px;
                    color: #407587;
                    margin-bottom: 15px;" > Puntuación promedio del {{ $comentarios[0]->place->name }}:</h3>
                    <h3>{{ number_format($puntos/$total,1) }}</h3>
                  @if (auth()->check())
                  <a class="btn btn-primary" data-toggle="modal" data-target="#nuevo">
                    Agregar Comentario
                  </a> 
                     
                  @endif  
                
            </div>
        </aside>
    </div>
    <div class="modal fade" id="nuevo" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                
                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <form action="{{ route('comentplace.store',) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputMessage">Realiza comentario</label>
                            <textarea class="form-control" name="descripcion" id="inputMessage" placeholder="Comentario minimo de 50 caracteres"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputPuntos">Puntuación</label>
                            <select  name ="points" class="form-control" id="inputPuntos">
                                <option value="1"> 1 Punto</option>
                                <option value="2"> 2 Punto</option>
                                <option value="3"> 3 Punto</option>
                                <option value="4"> 4 Punto</option>
                                <option value="5"> 5 Punto</option>
                            </select>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <a class="btn btn-danger" data-dismiss="modal">Close</a>
                            <input type="hidden" name="place_id" value="{{ $comentarios[0]->place->id }}"/>   
                            <input type="submit" class="btn btn-primary" value="Agregar"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (isset($comentarios))
    @include('establecimientos.message')
    <legend  class="text-primary" style="position: relative; left: 45%;">Comentarios sobre {{ $comentarios[0]->place->name }} </legend>
    <div class="col-md-8 order-2" style="right: 16%;">    
        @foreach ($comentarios as $comentario)
            <div class="container-comments my-5">
                <div class="comments" style="margin-top: 15%;">
                    <div class="info-comments" style="width: 160%;">
                        <div class="header">
                            <h4>{{ $comentario->user->name }}</h4>
                            <h5>{{ date('d - m - Y  //  h:i',strtotime($comentario->created_at))}}</h5>
                        </div>
                        <p>{{ $comentario->content }}</p>
                        <div class="footer">
                            {{ $comentario->points }}
                            @if(auth()->check() && auth()->user()->id == $comentario->user->id)    
                                <div class=" row align-items-end">
                                        <form action="" method="">
                                            <a href="" class=" btn btn-danger" style="margin-right: 10px;">Eliminar</a>
                                        </form>
                                        <form action="" method="">
                                            <a href="" class=" btn btn-secondary ">Editar</a>
                                        </form>
                                </div>
                            @endif    
                        </div>
                    </div>
                </div>
            </div>
            
        @endforeach
    </div>
        @else   
            <div class="col-md-8 order-2" style="right: 16%;">    
                <div class="alert-message alert-message-info" style=" background-color: #f4f8fa;
                border-color: #5bc0de; margin:20px 0;
                padding: 20px;
                border-left: 3px solid #eee;margin-top:30%;">
                    <div class="container-comments " style="">
                        <h4 style=" color: #5bc0de;">
                            Este sitio se encuentra sin comentarios !!
                        </h4>
                        <p>
                            Se el primero en realizar un comentario y cuentanos tu experiencia sobre este sitio.
                        </p>
                    </div>
                </div>
            </div>
        @endif       
    </div>


@endsection
@section('styles')
    <style>
    .alert-message-info
{
    background-color: #f4f8fa;
    border-color: #5bc0de;
}
.alert-message-info h4
{
    color: #5bc0de;
}
    </style>
@endsection