@extends('layouts.app')
@section('content')
@if(isset($establecimientos))
 <!-- content -->
 <div class="container-fluid">
   <div class="row">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
       {{-- <!-- indicators		 -->
       @foreach ($establecimientos as $establecimiento) 
       <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="active"></li>
        </ol>
        @endforeach --}}
       <!-- carousel-inner-->
  <div class="carousel-inner">
    @foreach ($establecimientos as $establecimiento)
    
      <div class="carousel-item @if($loop->index==0)active @endif">
          <img class="d-block w-100 img-fluid" src="http://via.placeholder.com/1700x600"  data-color="lightblue" alt="{{ $establecimiento->name }}"/>
          <div class="carousel-caption">
              <h3>{{ $establecimiento->name }}, {{ $establecimiento->id }}</h3>
              <p>¿Quisieras conocer más sobre este sitio?</p>
              <a href="{{route('place.show',$establecimiento->id) }}" class="btn btn-info">Conocer más</a>
            </div>
        </div>
        @endforeach    
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>

     </div>
 </div>
 </div>
  @else 
    <h2>En construcción</h2>    
@endif
@endsection


