@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/showevents.css') }}">
@section('content')
<div class="clear">    
        
<section id="noticias" >
        @include('establecimientos.message')
    <br>
    <h1 style="align-self: center; left: 45%;
    position: relative;">Eventos</h1>
    <hr>
    <ul style="margin-left: 8%">
            
        @foreach ($eventos as $evento)
    <li class="rojo" style="background-image: url(../storage/{{$evento->imagen_location}})">
          <h2> {{ $evento->title }}</h2>
          
          <a data-toggle="modal" data-target="#Info_{{$evento->id}}" class="boton" style=" @if(auth()->check()  && auth()->user()->roles[0]->rolname == "Administrador") width: 50%;@endif">Conocer más</a>
          @if(auth()->check())
          @if(auth()->user()->roles[0]->rolname == "Administrador") 
          <a data-toggle="modal" data-target="#Editar_{{$evento->id}}" class="boton" style="margin-left:50%;width: 50%;">Editar</a>
          @endif
          @endif
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
            <div class="modal fade" id="Editar_{{$evento->id}}" role="dialog" style="overflow-y: scroll;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar evento</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                          <!-- Modal Body -->
                        <div class="modal-body">
                          <p class="statusMsg"></p>
                          <form  action="{{ route('eventos.update',$evento->id) }}"   method="POST" enctype="multipart/form-data">
                                @csrf
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="txtName"> Nombre:</label>
                                  <input class="form-control"  name="title" type="text" placeholder="Nombre del evento" value="{{ $evento->title }}">
                                </div>
                              <div class="form-group col-md-6">
                                  <label for="txtFecha">Fecha de inicio</label>
                                <input class="form-control"   value="{{date('Y:m:d',strtotime($evento->start)) }}"type="text" disabled>
                              </div>
                              {{-- <div class="form-group col-md-6">
                                  <label for="txtFechaFinal">Fecha Final</label>
                                  <input class="form-control"type="date" id="txtFechaFinal" name="finish" max="2030-01-01">
                              </div> --}}
                          </div>
                          <div class="form-group">
                              <label for="inputDescription">Descripción</label>
                              <textarea class="form-control"  name="description"  cols="20" rows="10" placeholder="Descripción del evento..">{{ $evento->descripcion }}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="imagen_principal">Imagen </label>
                            <input type="file"class="form-control" id="addIm" name="imagen_location">     
                            <center>
                                    <h4>Imagen Actual</h4>  
                                <img style="width:200px; margin-top: 20px;" src="../storage/{{ $evento->imagen_location }}"></center>              
                        </div>            
                          <div class="form-group">
                              <label for="txtPlace">Sitio </label>
                              <select  name ="place_id"  class="form-control" required>
                                  <option value="">----------</option>
                                  @foreach($sitios as $sitio)
                                  <option value="{{ $sitio->id }}"> {{ $sitio->name }}</option>
                                  @endforeach
                          </select>
                          </div>
                          <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="txtName"> Hora inicio:</label>
                                  <input class="form-control" min="04:00" max="24:00"  step="600" id="txtHora" name="horainicio" type="time" value="{{ date('h:i:s',strtotime($evento->start))}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txtFecha">Hora final</label>
                                  <input class="form-control" id="txtFinal" min="04:00" max="24:00"  step="600" name="horafin" type="time" value="{{ date('h:i:s',strtotime($evento->end))}}">
                                </div>
                            </div>
                          <div class="form-group">
                              <label for="inputPuntos">Color:</label>
                              <input  class="form-control" type="color" id="txtColor" name="color" value="{{ $evento->color }}">
                          </div>
                          <!-- Modal Footer -->
                          <div class="modal-footer">
                            <input type="submit" id="btnAgregar" class="btn btn-success" value="Agregar">
                            <a class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
                          </div>
                        </form>  
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