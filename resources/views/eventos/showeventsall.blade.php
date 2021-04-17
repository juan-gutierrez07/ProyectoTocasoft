@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/showevents.css') }}">
@section('content')
<div class="clear">    
<section id="noticias" >
    <br>
    <h1 style="align-self: center;">Eventos</h1>
    <hr>
    <ul style="margin-left: 8%">
        <li class="rojo" style="background-image: url(https://marimurtra.cat/wp-content/uploads/2018/12/1700x600-Escales.jpg)">
          <h2> {{$places[0]->name}}</h2>
          <a data-toggle="modal" data-target="#Kaoru" class="boton">KaoruMishimaru</a>
        </li>

<!--Inicia Ventana Modal-->
	<div id="Kaoru" class="Modal">
	    <div class="ModalBox all">
	       
	        <input id="cerrar-modal" name="modal" type="radio" data-dismiss="modal"/>
            <label for="cerrar-modal"> X </label>

	        <div class="title"></div>
	        <div class="donde-estoy">
	        </div>
	        <div class="contenido">
	        	<div class="box">
	        		<img src="https://marimurtra.cat/wp-content/uploads/2018/12/1700x600-Escales.jpg" width="100%" align="left">
                    <br>
                    <h1  class="h1a">{{$places[0]->name}}</h1>
                </div>

	        	<hr class="hr1" style="margin-top: -15px">

	        	<div class="box">
                    <div style="background-color: rgba(206, 59, 59, 0.534); text-align: center; margin-right: 5%;margin-left: 5%">
		        	<h3 style="font-weight: bolder">Informacion</h3>

		        	<p>
		        	Aqui va la descripcion
		        	</p>
                    <div style="background-color: rgba(172, 103, 103, 0.836); text-align: center; margin-right: 25%;margin-left: 25%">    
                    <h5><strong>Fecha:</strong>  Hay que poner la hora</h5>
                    <h5><strong>Inicio:</strong> Hay que poner la hora</h5>
                    <h5><strong>Final:</strong> Hay que poner la hora</h5>
                    <h5><strong>Lugar:</strong> Hay que poner el Lugar</h5>
                    <br>
	        	    </div>
                    <br>
                </div>
                <br>
                </div>
	        </div>
	    </div>
	</div>
<!--Termina Ventana Modal-->
        <li class="rojo" style="background-image: url(https://equinoxfinance.com/libs/uploads/2016/04/Landing-Page-1700x600.jpg)">
            <h2> {{$places[1]->name}}</h2>
            <a href="">Leer mas</a>
        </li>
        
        <li class="rojo" style="background-image: url(https://equinoxfinance.com/libs/uploads/2016/04/Landing-Page-1700x600.jpg)">
            <h2> {{$places[1]->name}}</h2>
            <a href="">Leer mas</a>
        </li>

        </ul>
</section>
</div>
@endsection