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
<div class="divisionpersonal" style="margin-top: 0">
    @if ($modulos->isEmpty() || $modulos[0]->state_publication_id == '2')
        <h2>Sin contenido....</h2>
    @else
    <section id="yourServices" class="container">
        <h2 class="display-42 text-center mt-5 mb-3">{{ $modulos[0]->name}}</h2>
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
<div class="coldiv2" style="margin-top:0%">
<section id="yourContact" class="container-fluid text-center py-4 mt-4 "  id="contact">
    <div class="row">
        <div class="your-contact-text col">
            <h2 class="display-4 pb-9 my-4" >Rutas turisticas</h2>
            <p class="lead pb-3">Disfruta de la ruta que elijas</p>
        </div>
    </div>
            <a href="{{ route('ruta.all') }}" class="your-btn-primary1 btn btn-primary btn-lg  mb-4" role="button">Conocelas</a>
</section>
</div>
<!-- end of #yourContact -->
<!-- partial:index.partial.html -->
<div class="divisionpersonal1">
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
<div class="modal fade" id="Noacces" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Acción denegada</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
    
                <!-- Modal Body -->
                <div class="modal-body">
                    <p>
                        
                    </p>
    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if($("#rol").val() == "Turista")
        {
            $("#Noacces").modal();
        }
    });
</script>    

