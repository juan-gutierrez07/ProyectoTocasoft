<!-- #yourHeader -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<header id="yourHeader" class="jumbotron jumbotron-fluid">

@extends('layouts.app')
@section('content')

<div class="container">
        <input type="hidden" name="rol" id="rol" @if(auth()->check()) value="{{ Auth::user()->roles[0]->rolname}}"@endif>
        @if (session('status_success'))
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button> 
            {{ session('status_success') }}
        </div>
       @endif
       @if ($errors->any())
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>     
            <ul>
               @foreach($errors->all() as $error) 
                <li>{{ $error }}</li>
               @endforeach
            </ul>
        </div>
       @endif
</div>
</header>
<div class="your-header-content container-fluid text-center text-white" style="margin-top: -32px">
    <div class="row">
        <div class="your-header-text coldiv1" style="opacity: 0.9;">
            <br><br>
            <h1 class="display-3">Bienvenido</h1>
            <p class="leaddiv1 pb-4" style="margin-top: -40px">Conoce mas a cerca de nuestro maravilloso municipio</p>
        </div>
    </div>
</div>
<!-- end of header -->

<!-- #yourServices -->
<div class="divisionpersonal" style="margin-top: 0;overflow: auto" id="Sitios">
    
    @if ($modulos[0]->state_publication_id == '2')
        <h2>Sin contenido....</h2>
    @else
    <section id="yourServices" class="container">
        <h2 class="display-42 text-center mt-5 mb-3">{{ $modulos[0]->name}}</h2>
        <br><br>
        <div class="row text-center" style="display: flex; justify-content: center;">
            @foreach ($modulos[0]->articles->where('state_publication_id',1) as $articulo)
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="../storage/{{ $articulo->image_location }}" alt="{{ $articulo->name }}">
                        <div class="card-body">
                            <h4 class="card-title">Sitios {{ $articulo->name }}</h4>
                            <p class="card-text">{{ $articulo->description }}</p>
                        </div>
                        <div class="card-footer py-4">
                            <a href="{{ route('category.place',$articulo->slug) }}" class="btn-info nav-link">Más Información</a>
                        </div>
                    </div>
                </div>
            @endforeach    
        </div>
     </section>
     <!-- end of #yourServices -->
    @endif
</div>    
<!-- #yourContact -->
<div class="coldiv2" style="margin-top:0%" id="rutas">
<section id="yourContact" class="container-fluid text-center py-4 mt-4 "  id="contact">
    <div class="row">
        <div class="your-contact-text col">
            <h2 class="display-4 pb-9 my-4" >Rutas turisticas</h2>
            <p class="lead pb-3">Disfruta de la ruta que elijas</p>
        </div>
    </div>
            <a href="#" class="your-btn-primary1 btn btn-primary btn-lg  mb-4" role="button">Conocelas</a>
</section>
</div>
<!-- end of #yourContact -->
<!-- partial:index.partial.html -->
<div class="divisionpersonal1" id="personal">
<section  class="container" >
<div class="row text-center" >
   <div class="team mt-125">
      <div class="your-contact-text container ">
         <h2 class="display-41 text-center mt-5 mb-3">Personal Secretaria de Turismo</h2>
         <br><br>
         <div class="row" style="display: flex; justify-content: center;">
            @foreach ($modulos[1]->abous_us as $personal)
              <div class="col-lg-3 col-md-6">
                  <div class="team-item">
                      <div class="team-img">
                          <img src="../storage/{{$personal->imagen_location }}" alt="{{ $personal->name }}">
                      </div>
                      <div class="team-text">
                          <h2>{{ $personal->name }} {{ $personal->lastname }}</h2>
                          <p>{{ $personal->position }}</p>
                          <p>{{$personal->phone}}</p>
                          <p>{{$personal->email}}</p>
                      </div>
                  </div>
              </div>
            @endforeach              
        </div>
      </div>
  </div>
</div>
</section>
</div>
<!-- partial -->

<div class="modal fade" id="Noacces" role="dialog" >
    <center>
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: rgba(68, 68, 68, 0); border-color: rgba(68, 68, 68, 0)" >
                <!-- Modal Body -->
                <div class="modal-body">
                    <img src="{{"../../images/iconos/Bienvenido.gif"}}" style="max-width: 800px;max-height: 600px;" alt="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-top: -10%;margin-left: -80%; background-color: rgb(255, 255, 255); color: black; font-weight: bolder;">Close</button>
                </div>
        </div>
    </div>
</div>
    </center>
 </div>

<!--footer-->
 <footer class="footer-07">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <img src="{{ asset('../images/iconos/tocaimatittle.png') }}" style="height: 120px; width:280px ">
                <br>
                <br>
                <p class="menu">
                    <a href="#">Home</a>
                    <a href="#Sitios">Ver sitios</a>
                    <a href="#rutas">Rutas</a>
                    <a href="#personal">Personal</a>
                </p>
                <ul class="ftco-footer-social p-0">
      <li class="ftco-animate"><a href="https://twitter.com/AlcaldiaTocaima" target="_blank"><img src="https://www.freeiconspng.com/thumbs/logo-twitter-png/logo-twitter-icon-symbol-0.png" width=48 height=48 alt="Síguenos en Twitter" /></a> </a></li>
      <li class="ftco-animate"><a href="https://www.facebook.com/AlcaldiaDeTocaima" target="_blank"><img alt="Siguenos en Facebook" src="https://lh3.googleusercontent.com/-NSLbC_ztNls/T6VX0g6z8AI/AAAAAAAAA0A/_vyIBrmZbuY/s48/facebook48.png" width=48 height=48  /></a></li>
      <li class="ftco-animate"><a href="https://www.instagram.com/alcaldiadetocaima/" target="_blank"><img alt="Siguenos en Blogger" src="https://lh3.googleusercontent.com/-D-erW-8vZFo/UIqE3H6oUuI/AAAAAAAABgE/4kh346Lwaxk/s48/instagram48.png" width=48 height=48  /></a> </span></a></li>
      <li class="ftco-animate"> <a href="https://www.youtube.com/channel/UCmid4NUKUP_7sU5QhV420xA" target="_blank"><img alt="Siguenos en YouTube" src="https://lh6.googleusercontent.com/-Atgpy-x_OwI/T6mYkA18hYI/AAAAAAAAA1U/qksUJ5uBq3c/s48/youtube48.png" width=48 height=48  /></a></a></li>
    </ul>
    <div class="col-md-12 text-center">
        <a style="color: white; font-size: 16px; "> Direccion : Calle 5 con Carrera 9 Esquina Palacio Municipal - Tocaima - Cundinamarca</a>
        <br>
        <br>
        <a style="color: white; font-size: 16px; ">Teléfono Conmutador: (057) (1) 8340517</a>
    </div>
            </div>
            
        </div>
     </div>
</footer>
<!--Final footer-->
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if($("#rol").val() == "Turista")
        {
            $("#Noacces").modal();
        }
    });
</script>    

