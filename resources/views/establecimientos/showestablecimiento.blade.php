@extends('layouts.app')
@section('content')
    {{-- <mapa-ubicacion latitud ={{ $place[0]->lat }} longitud = {{ $place[0]->lng }}></mapa-ubicacion> --}}
    <div class ="container my-5">
        @include('establecimientos.message')
        <h2 class="text-center mb-5"> {{$place->name}} </h2>
         <div class="row align-items-start">
             <div class="col-md-8 order-2">
                 <div class="card">
                     <img src="../storage/{{$place->imagen_principal}}" class="card-img-top" alt="imagen establecimiento">
                     <div class="card-body">
                         <h3 class="card-title text-primary font-weight-bold"> Descripcion:</h3>
                         <p class="mt-3"> {{$place->descripcion}}   </p>
                     </div>
                 </div>
                     ------
             </div>
                <div class="col-md-4 order-1">
                    <aside>
                    <div>
                        <mapa-ubicacion latitud ={{ $place->lat }} longitud = {{ $place->lng }}></mapa-ubicacion>
                    </div>
                        <div class="p-4 bg-primary ">
                            <h2 class="text-center text-white mt-2 mb-4">Más Información</h2>
        
                            <p class="text-white mt-1">
                                <span class="font-weight-bold">
                                    Ubicación:
                                </span>
                                {{$place->direccion}}
                            </p>
        
                            <p class="text-white mt-1">
                                <span class="font-weight-bold">
                                    Horario:
                                </span>
                                {{$place->apertura}} - {{$place->cierre}}
                            </p>
        
                            <p class="text-white mt-1">
                                <span class="font-weight-bold">
                                    Teléfono:
                                </span>
                                {{$place->telefono}}
                            </p>
                        </div>
                    </aside>
                    <a href="{{ route('coment.place',$place->id) }}" class="btn btn-success my-3">Mirar Comentarios</a>
                </div>      
         </div>
     </div>
@endsection