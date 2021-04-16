@extends('layouts.app')
@section('content')
  @if(isset($establecimientos))
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      {{-- <ol class="carousel-indicators">
        @foreach ($establecimientos as $establecimiento)
          <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"   @if($loop->index==0) class="active" @endif></li>
        @endforeach
      </ol> --}}
      <div class="carousel-inner">
        @foreach ($establecimientos as $establecimiento)
          <div class="carousel-item @if($loop->index==0) active @endif">
            <img class="d-block w-100" src="{{ asset('storage/'.$establecimiento->imagen_principal) }}" alt="First slide">
            <div class="carousel-caption">
              <h3>{{ $establecimiento->name }}, {{ $establecimiento->id }}</h3>
              <p>¿Quisieras conocer más sobre este sitio?</p>
              <a href="{{route('place.show',$establecimiento->id) }}" class="btn btn-info">Conocer más</a>
            </div>
          </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  @else 
    <h2>En construcción</h2>    
  @endif
@endsection


