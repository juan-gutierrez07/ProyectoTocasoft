@extends('layouts.app')
@section('content')

<div class="container">
    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear Ruta</li>
        </ol>
  </nav> --}}
    <h1 class="text-center mt-4">Editar Ruta Turistica</h1>
<div class="mt-5 row justify-content-center">
@include('establecimientos.message')
<form
    class="col-md-9 col-xs-12 card card-body"
    action="{{ route('ruta.update',$ruta->id) }}"
    method="POST"
    enctype="multipart/form-data"
  >
  @csrf
      <legend class="text-primary text-center mt-4">Datos de {{ $ruta->name }}</legend>
      <div class="form-group">
          <label for="nombre">Nombre Ruta Turistica</label>
          <input
              id="nombre"
              type="text"
              class="form-control @error('nombre') is-invalid @enderror "
              placeholder="Nombre Establecimiento"
              name="name"
              value="{{ $ruta->name }}"
              required
          >

          @error('nombre')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
          @enderror
      </div>
          <div class="form-group">
              <label for="imagen_principal">Imagen Principal</label>
              <input
                  id="imagen_principal"
                  type="file"
                  class="form-control @error('imagen_principal') is-invalid @enderror "
                  name="imagen_principal"
                  value="{{ old('imagen_principal') }}"
                  
              >
              <img style="width:200px; margin-top: 20px;" src="/storage/{{ $ruta->imagen_principal }}">        
            </div>
      
        <div class= form-group>
          <label for="descripction"> Descripción</label>
          <textarea
          class="form-control"  
          name="description">{{ old('descripcion') }} {{ $ruta->description }}</textarea>

          @error('descripcion')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
          @enderror
        </div>  
        <div class="form-group">
            <label for="time_travel">Tiempo de recorrido</label>
            <input
                id="time_travel"
                type="text"
                class="form-control @error('time_travel') is-invalid @enderror "
                placeholder="Tiempo promedio de recorrido"
                name="time_travel"
                value="{{ $ruta->time_travel }}"
                
            >

            @error('time_travel')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>          
        
  </fieldset>
  <fieldset class="border p-4">
<legend class="text-primary text-center mt-4">Sitios turisticos registrados en la ruta</legend>
<div class="container-lg my-4">
      <div class="container">
        @foreach ($categoria as $categorias)
        <div class="accordion" id="accordionExample_{{ $categorias->id}}" style="margin-bottom: 10px; padding: 10px;">
          <div class="card" style="border-radius: 10px;">
            <div class="card-header" id="heading" style="background-color: #DCDCDC;">
              <h4 class="mb-0">
                {{ $categorias->name }}
              </h4>
            </div>
              <div class="card-header shadow" id="cultural" role="button" data-toggle="collapse" href="#collapse_{{ $categorias->id }}" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration:none;">
                <h5 class="panel-title">
                  <a>
                  Sitios Registrados
                  </a>
                </h5>
              </div>
              <div id="collapse_{{ $categorias->id }}" class="panel-collapse collapse" aria-labelledby="Sitios {{ $categorias->name }}" data-parent="#accordionExample_{{ $categorias->id}}">
                <div class= "card-body">
                    @foreach ($categoria as $category)
                    @foreach ( $category->places as $place )
                      @if ($categorias->id == $categorias->id )
                        @if($place->category_id ==$categorias->id  )
                          <div class="row"> 
                              <div class="col">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" 
                                  class="custom-control-input" 
                                  id="place_{{$place->id}}"
                                  value="{{$place->id}}"
                                  name="place[]"
                                  @if( is_array(old('place')) && in_array("$place->id", old('place'))    )
                                  checked
                                  @elseif( is_array($places_id) && in_array("$place->id",$places_id))
                                    checked
                                  @endif
                                  >
                                    <label class="custom-control-label" 
                                      for="place_{{$place->id}}">
                                      {{ $place->name }} 
                                    </label>
                                </div>
                              </div>
                          </div>    
                        @endif
                      @endif
                    @endforeach    
                @endforeach
              </div>
              </div>
          </div>
      </div>
    @endforeach  
  </div>                       
</div>
</fieldset>
<fieldset class="border p-4">
        <legend class="text-primary text-center mt-4">Imagenes del sitio</legend>
        <div class="col-md-12 row">
            @foreach ($imagenes as $imagen )
                <div class="col-md-4 mb-4">
                    <div class="card" style="justify-content:space-evenly;">
                        <img class="card-img-top" src="../../storage/{{ $imagen->location }}" alt="{{ $imagen->name }}">
                        <div class="card-body">
                            <eliminar-imagen-ruta imagen-id= {{ $imagen->id }}></eliminar-imagen-ruta>
                        {{-- <a class=" btn btn-danger" id="eliminar">Eliminar</a> --}}
                        </div>
                    </div>  
                </div>
            @endforeach
        </div>   
</fieldset>   
       <input type="hidden" id="uuid" name="uuid" value="{{ $place->uuid }}">   
      <input type="submit" class="btn btn-primary mt-3 d-block" value="Editar Ruta Turistica">
  </form>
  </div>
</div>
@endsection
