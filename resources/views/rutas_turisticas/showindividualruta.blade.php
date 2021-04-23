@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/showindividualruta.css') }}">

@section('content')
<h1  class="display-3" style="position: relative;margin-left:30%;">Bienvenido Turista ! </h1>
<br>
<input type="hidden" id="idRuta" value="{{ $tuoristroute->id }}">
<div class="row align-items-start">
    <div class="col order-1" id="contenedor">
        <aside>
                <div style="width: 130%;height:600px;padding: 0px 0.5em;right: 5%;margin-left: 1%;">
                        <div id="maparutas" style="height: 500px;width: 100%;"></div>
                    </div>       
        </aside>
    </div>
    <div class="col order-2" style="float: right; margin-left: 1%;">    
        <div style="float: right; width: 75%;height: 80%; padding: 0 0.5em; left: 65%;">
                <div class="card">
                    <img class="card-img-top" src="https://www.tekcrispy.com/wp-content/uploads/2019/03/Cascada-640x410.jpeg">
                    <div class="card-body" style="height: 70%;">
                        <h4 class="card-title">{{ $tuoristroute->name }}</h4>
                        <p class="card-text">{{ $tuoristroute->description }}</p>
                    </div>
                </div>
            </div>
    </div>   
</div>    
@endsection