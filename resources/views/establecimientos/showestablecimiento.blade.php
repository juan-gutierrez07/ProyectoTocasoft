@section('styles')
<link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">    
@endsection
@extends('layouts.app')
@section('content')

    {{-- <mapa-ubicacion latitud ={{ $place->lat }} longitud = {{ $place->lng }}></mapa-ubicacion> --}}
    <div class ="container my-5">
        @include('establecimientos.message')
        <h2 class="text-center mb-5 display-87"> {{$place->name}} </h2>
         <div class="row align-items-start">
             <div class="col-md-8 order-2">
                 <div class="card">
                    <img src="../storage/{{$place->imagen_principal}}" class="" alt="imagen establecimiento" style="max-width: 100%; height: 350px;"> 
                     <div class="card-body">
                         <h3 class="card-title  font-weight-bold" style="font-family: 'Asap', sans-serif; font-size: 36px;"> Descripcion:</h3>
                         <p class="mt-3" style="font-size: 20px;"> {{$place->descripcion}}   </p>

                     </div>
                 </div>
                <section>
                    <center>
                    <h1 class="display-31 ">Galeria de imagenes</h1>
                    </center>
                    <br>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          @foreach ($images as $image)
                            <div class="carousel-item @if($loop->index==0) active @endif">
                             <center>
                                <img class="d-block w-100" src="{{ asset('storage/'.$image->location) }}" alt="First slide" style="max-width:80%;width:auto;height:auto;">
                            </center>
                            </div>
                          @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="background-color: rgba(0, 0, 0, 0.322);">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="background-color: rgba(0, 0, 0, 0.384);">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>    
                </section>
             </div>
                <div class="col-md-4 order-1">
                    <aside>
                    <div>
                        <mapa-ubicacion latitud ={{ $place->lat }} longitud = {{ $place->lng }}></mapa-ubicacion>
                    </div>
                        <div class="p-4  " style="background-color: rgb(22, 107, 22)">
                            <h2 class="text-center text-white mt-2 mb-4">Más Información</h2>
        
                            <p class="text-white mt-1" style="font-size: 16px">
                                <span class="font-weight-bold">
                                    Ubicación:
                                </span>
                                {{$place->direccion}}
                            </p>
        
                            <p class="text-white mt-1" style="font-size: 16px">
                                <span class="font-weight-bold">
                                    Horario:
                                </span>
                                {{$place->apertura}} - {{$place->cierre}}
                            </p>
        
                            <p class="text-white mt-1" style="font-size: 16px">
                                <span class="font-weight-bold">
                                    Teléfono:
                                </span>
                                {{$place->telefono}}
                            </p>
                            <a href="{{ route('coment.place',$place->id) }}" class="btn btn-success my-3">Mirar Comentarios</a> <a href="" class="btn btn-danger my-3">Atrás</a>
                        </div>  
                    </aside>

                    <a href="{{ route('coment.place',$place->id) }}" class="btn btn-success my-3">Mirar Comentarios</a>
                </div>      

                  </div>      

         </div>
     </div>
     
    <!-- Lightbox usage markup -->

<!-- thumbnail image wrapped in a link -->

              <!-- lightbox container hidden with CSS -->
              
              
            
@endsection
