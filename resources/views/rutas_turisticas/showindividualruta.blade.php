
@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/showindividualruta.css') }}">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
@endsection
@section('content')
<h1  class="display-3" style="position: relative;margin-left:30%; color: rgb(34, 117, 34); margin-right: -5%">Bienvenido Turista ! </h1>
<br>
<input type="hidden" id="idRuta" value="{{ $tuoristroute->id }}">
<div class="row align-items-start my-5" style="height: 800px;width: 80%;">
    <div class="col order-1" id="contenedor">
        <center>
        <h4 class="card-title display-3" style="color:rgb(18, 116, 23);font-size: 48px">RUTA</h4>
        </center>
        <aside>
                <div style="width: 130%;height:600px;padding: 0px 0.5em;right: 5%;margin-left: 1%;">
                        <div id="maparutas" style="height: 800px;width: 100%;"></div>
                    </div>       
        </aside>
    </div>
    <div class="" style="float: right; margin-left: 1%;height: 100%; width: 55%;">    
        
        <div style="float: right; width: 100%;height: 80%; padding: 0 0.5em; left: 65%;">
            <center>
            <h4 class="card-title display-3" style="color:rgb(18, 116, 23);font-size: 48px">{{ $tuoristroute->name }}</h4>
            </center>
                <div class="card">
                    <section style="height: 80%">
                        <div class="product-slider">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
                                <div class="item active"> <img src="../storage/{{ $tuoristroute->imagen_principal }}" style="max-width: 100%;min-width: 100%;"> </div>
                               @foreach ($images as $image)
                               <div class="item"> <img src="{{ asset('storage/'.$image->location) }}" style="max-width: 100%;min-width: 100%;"> </div>
                               @endforeach
                                </div>
                            </div>
                            <div class="clearfix">
                              <div id="thumbcarousel" class="carousel slide" data-interval="false">
                                <div class="carousel-inner">
                                  <div class="item active">
                                    <div data-target="#carousel" data-slide-to="0" class="thumb"><img  src="../storage/{{ $tuoristroute->imagen_principal }}"></div>
                                    @foreach ($images as $image)
                                    <div data-target="#carousel" data-slide-to="{{$loop->index+1}}" class="thumb"><img src="{{ asset('storage/'.$image->location) }}"></div>
                                    @endforeach
                                   
                                  </div>
                                  
                                </div>
                             | </div>
                            </div>
                          </div>
                          
                    </section>
                
                    <div class="card-body" style="height: 70%; overflow: auto">
                        <center>
                        <h4 class="card-title"  style="font-family: 'Asap';font-size: 28px;color: green">Información:</h4>
                        </center>
                        <p class="card-text" style="font-size: 25px">{{ $tuoristroute->description }}</p>
                        <h4 class="card-title"  style="font-family: 'Asap';font-size: 28px;color: green">Tiempo de recorrido:</h4>
                        <p class="card-text " style="font-size: 25px"> {{ $tuoristroute->time_travel }}</p>
                    </div>
                    </div>
            </div>
    </div>   
</div>    
@endsection
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
