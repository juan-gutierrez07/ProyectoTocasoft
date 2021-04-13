@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/comentarios.css') }}">
@endsection
@section('content')
<h1  class="display-3" style="position: relative;">Comentarios sobre {{ $comentarios[0]->place->name }} </h1>
<br>
<div class="row align-items-start">
    <div class="col-md-4 order-1" id="contenedor" style="right:20%;">
        <aside>
            <div class="card " style="float: left;margin-left: -15%" >
                            <img class="card-img-top" src="../../storage/{{ $comentarios[0]->place->imagen_principal }}" alt="Location">
                            <div class="card-body">
                            <h3 class="card-title" style="font-size: 21px; text-align: center;
                                margin-bottom: 15px;" >{{ $comentarios[0]->place->name }}</h3>
        
                                <h3 id ="comentarios">Total Comentarios : {{ $total }}</h3>
                     
                                <h3 id="promedio">Puntuación promedio : {{ number_format($puntos/$total,1) }}</h3>
                            </div>
                            <div class="card-footer py-4">
                              @if (auth()->check())
                              <a class="btn nav-link btn-style"  data-toggle="modal" data-target="#nuevo">
                                Agregar Comentario
                              </a> 
                            </div>
                              @endif  
            </div>
        </aside>
    </div>
    <div class="modal fade" id="nuevo" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Comentario</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                
                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <form action="{{ route('comentplace.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputMessage">Realiza comentario</label>
                            <textarea class="form-control" name="descripcion" id="inputMessage" placeholder="Comentario minimo de 50 caracteres"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputPuntos">Puntuación</label>
                            <select  name ="points" class="form-control" id="inputPuntos">
                                    <option value=" "> -------</option>
                                    <option value="1"> 1 Puntos</option>
                                    <option value="2"> 2 Puntos</option>
                                    <option value="3"> 3 Puntos</option>
                                    <option value="4"> 4 Puntos</option>
                                    <option value="5"> 5 Puntos</option>
                            </select>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <a class="btn btn-danger" data-dismiss="modal">Cerrar</a>
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
    <div class="col-md-8 order-2" style="right: 16%;float: right;">    
        @foreach ($comentarios as $comentario)
        <div class="comment-main-level">
            <!-- Contenedor del Comentario -->
           <div class="comment-box">
               <div class="comment-head">
                   <h6 class="comment-name by-author">{{ $comentario->user->name }}</h6>
                   <span>{{ date('d - m - Y  //  h:i',strtotime($comentario->created_at))}}</span>
               </div>
               <div class="comment-content">
                {{ $comentario->content }} 
                <br>
                <strong>Puntuacion sitio: </strong> 
                {{ $comentario->points }}
                @if(auth()->check() && auth()->user()->id == $comentario->user->id)    
                                <div class=" row align-items-end" style="position: relative; right: 1%;">
                                    <br>
                                        <eliminar-comentario style="margin-left: 5%" comentario-id={{ $comentario->id }}></eliminar-comentario>
                                        <a class="btn btn-secondary" data-toggle="modal" data-target="#editar" >
                                             Editar
                                        </a>
                                        {{-- Editar modal --}}
                                <div class="modal fade" id="editar" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Editar Comentario</h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">×</span>
                                                        <span class="sr-only">Close</span>
                                                    </button>
                                                </div>
                                                
                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <p class="statusMsg"></p>
                                                    <form action="{{ route('coment.update',$comentario->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="inputMessage">Edita comentario</label>
                                                            <textarea class="form-control" name="content" id="inputMessage">{{ $comentario->content }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputPuntos">Puntuación</label>
                                                            <select  name ="points" class="form-control" id="inputPuntos">
                                                                <option value=" "> -------</option>
                                                                <option value="1"> 1 Puntos</option>
                                                                <option value="2"> 2 Puntos</option>
                                                                <option value="3"> 3 Puntos</option>
                                                                <option value="4"> 4 Puntos</option>
                                                                <option value="5"> 5 Puntos</option>
                                                            </select>
                                                        </div>
                                                        <!-- Modal Footer -->
                                                        <div class="modal-footer">
                                                            <a class="btn btn-danger" data-dismiss="modal">Cerrar</a>
                                                            <input type="hidden" name="place_id" value="{{ $comentarios[0]->place->id }}"/>   
                                                            <input type="submit" class="btn btn-primary" value="Agregar"/>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif   
                </div>
           </div>
       </div>
            <br>
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