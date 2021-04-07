@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/comentarios.css') }}">
@endsection
@section('content')
<div class="row align-items-start">
    <div class="col-md-4 order-1" id="contenedor" style="right:20%;">
        
        <aside>
            <div class="p-4 bg-light" style="margin-top: 45%; text-align: center; border-radius: 4px">
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
                    <a class="btn btn-primary my-4" style="margin-right: 10px;" data-toggle="modal" data-target="#Comentario">Agregar comentario</a>
            </div>
        </aside>
    </div>
    @if (isset($comentarios))
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
                            <h5>{{ date('d - m - Y  //  h:i',strtotime($comentario->created_at))}}</h5>
                        </div>
                        <p>{{ $comentario->content }}</p>
                        <div class="footer">
                            {{ $comentario->points }}
                            @if(auth()->check() && auth()->user()->id === $comentarios[0]->user->id)    
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
            </div>
        @endforeach
    @else   <div class="col-md-8 order-2" style="right: 16%;">    
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

<div class="modal " id="Comentario" role="dialog">
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
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data"
                >
                    @csrf
                    <div class="form-group">
                        <label for="inputName">Nombre</label>
                        <input type="text" class="form-control" name="name" id="inputName" placeholder="Enter your name"/>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="inputMessage" placeholder="Enter your message"></textarea>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <a class="btn btn-danger" data-dismiss="modal">Close</a>
                        <input type="submit" class="btn btn-primary" value="Agregar"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
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