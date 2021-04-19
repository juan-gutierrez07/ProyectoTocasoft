<!-- #yourHeader -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <header id="yourHeader" class="jumbotron jumbotron-fluid">
        <pagina-principal></pagina-principal>
@extends('layouts.app')
@section('content')

<div class="container">
    
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
    @if ($modulos[0]->state_publication_id == '2')
        <h2>Sin contenido....</h2>
    @else
    <section id="yourServices" class="container">
        <h2 class="display-4 text-center mt-5 mb-3">{{ $modulos[0]->name}}</h2>
        <div class="row text-center" style="display: flex; justify-content: center;">
            @foreach ($modulos[0]->articles->where('state_publication_id',1) as $articulo)
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="http://4.bp.blogspot.com/_ivMmKzX0BpY/SxadRhqVMmI/AAAAAAAAACY/yQBmDpdlwZQ/s320/cascada+azul.jpg" alt="Design">
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
<div class="coldiv2" style="margin-top: 10%">
<section id="yourContact" class="container-fluid text-center py-4 mt-4 "  id="contact">
    <div class="row">
        <div class="your-contact-text col">
            <h2 class="display-4 pb-9 my-4">Rutas turisticas</h2>
            <p class="lead pb-3">Some message how to get in touch with you.</p>
        </div>
    </div>
            <a href="#" class="your-btn-primary1 btn btn-primary btn-lg  mb-4" role="button">Conocelas</a>
</section>
</div>
<!-- end of #yourContact -->
<!-- partial:index.partial.html -->
<div class="divisionpersonal1">
<section  class="container" >
<div class="row text-center">
   <div class="team mt-125">
      <div class="your-contact-text container ">
         <h2 class="display-41 text-center mt-5 mb-3">Personal Secretaria de Turismo</h2>
         <br><br>
         <div class="row">
              <div class="col-lg-3 col-md-6">
                  <div class="team-item">
                      <div class="team-img">
                          <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/Leonardo_Dicaprio_Cannes_2019.jpg" alt="Team Image">
                      </div>
                      <div class="team-text">
                          <h2>Donald John</h2>
                          <p>Founder & CEO</p>
                          <div class="team-social">
                              <a href=""><i class="fab fa-twitter"></i></a>
                              <a href=""><i class="fab fa-facebook-f"></i></a>
                              <a href=""><i class="fab fa-linkedin-in"></i></a>
                              <a href=""><i class="fab fa-instagram"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="team-item">
                      <div class="team-img">
                          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Tom_Holland_by_Gage_Skidmore.jpg/220px-Tom_Holland_by_Gage_Skidmore.jpg" alt="Team Image">
                      </div>
                      <div class="team-text">
                          <h2>Adam Phillips</h2>
                          <p>Chef Executive</p>
                          <div class="team-social">
                              <a href=""><i class="fab fa-twitter"></i></a>
                              <a href=""><i class="fab fa-facebook-f"></i></a>
                              <a href=""><i class="fab fa-linkedin-in"></i></a>
                              <a href=""><i class="fab fa-instagram"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="team-item">
                      <div class="team-img">
                          <img src="https://tendencybook.com/wp-content/uploads/2020/02/110577-11.jpg" alt="Team Image">
                      </div>
                      <div class="team-text">
                          <h2>Thomas Olsen</h2>
                          <p>Chef Advisor</p>
                          <div class="team-social">
                              <a href=""><i class="fab fa-twitter"></i></a>
                              <a href=""><i class="fab fa-facebook-f"></i></a>
                              <a href=""><i class="fab fa-linkedin-in"></i></a>
                              <a href=""><i class="fab fa-instagram"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="team-item">
                      <div class="team-img">
                          <img src="https://cdn2.vogue.es/uploads/images/thumbs/es/vog/2/s/2017/13/anne_hathaway_7489_620x.jpg" alt="Team Image">
                      </div>
                      <div class="team-text">
                          <h2>James Alien</h2>
                          <p>Advisor</p>
                          <div class="team-social">
                              <a href=""><i class="fab fa-twitter"></i></a>
                              <a href=""><i class="fab fa-facebook-f"></i></a>
                              <a href=""><i class="fab fa-linkedin-in"></i></a>
                              <a href=""><i class="fab fa-instagram"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</section>
</div>
<!-- partial -->

@endsection    

