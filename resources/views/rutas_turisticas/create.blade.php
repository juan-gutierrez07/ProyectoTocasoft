@extends('layouts.app')
@section('content')

<div class="container">
    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear Ruta</li>
        </ol>
  </nav> --}}
    <h1 class="text-center mt-4">Registrar Ruta Turistica</h1>

  <div class="mt-5 row justify-content-center">
    @include('establecimientos.message')
    <form
        class="col-md-9 col-xs-12 card card-body"
        action="{{ route('place.store') }}"
        method="POST"
        enctype="multipart/form-data"
      >
      
      @csrf
      <fieldset class="border p-4">
          <legend class="text-primary text-center mt-4">Datos para la nueva ruta</legend>
          <div class="form-group">
              <label for="nombre">Nombre Ruta Turistica</label>
              <input
                  id="nombre"
                  type="text"
                  class="form-control @error('nombre') is-invalid @enderror "
                  placeholder="Nombre Establecimiento"
                  name="name"
                  value="{{ old('nombre') }}"
                  required
              >

              @error('nombre')
                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
              @enderror
          </div>

          <div class="form-group">
              <label for="categoria">Categoría</label>

              <select
                  class="form-control @error('categoria_id') is-invalid @enderror"
                  name="categoria_id"
                  id="categoria"
                  required
              >
                  <option value="" selected disabled>-- Seleccione --</option>

                  
              </select>
              @error('categoria_id')
                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
              @enderror
          </div>
            <div class= form-group>
              <label for="descripction"> Descripción</label>
              <textarea
              class="form-control  @error('descripcion')  is-invalid  @enderror"
              name="descripcion"
              required >{{ old('descripcion') }}</textarea>

              @error('descripcion')
                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
              @enderror
            </div>            
      </fieldset>
      <fieldset class="border p-4">
          <legend class="text-primary text-center mt-4">Sitios Turisticos registrados</legend>
          <div class="container-lg my-4">
                <div class="container">
                  <div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
                    <div class="card" style="border-radius: 10px;">
                      <div class="card-header" id="heading" style="background-color: #DCDCDC;">
                        <h4 class="mb-0">
                          Cultural
                        </h4>
                      </div>
                        <div class="card-header shadow" id="cultural" role="button" data-toggle="collapse" href="#collapsecultural" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                          <h5 class="panel-title">
                            <a>
                            Sitios Registrados
                            </a>
                          </h5>
                        </div>
                        <div id="collapsecultural" class="panel-collapse collapse" aria-labelledby="Sitios Culturales" data-parent="#accordionExample">
                          <div class= "card-body">
                              @foreach ($categoria as $categorias)
                              @foreach ( $categorias->places as $place )
                                @if ($categorias->id == 1)
                                  @if($place->category_id == 1)
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
                           
                  <div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
                    <div class="card" style="border-radius: 10px;">
                      <div class="card-header" id="heading" style="background-color: #DCDCDC;">
                        <h4 class="mb-0">
                          Naturales
                        </h4>
                      </div>
                        <div class="card-header shadow" id="natural" role="button" data-toggle="collapse" href="#collapsenaturales" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                          <h5 class="panel-title">
                            <a>
                              Sitios Registrados
                            </a>
                          </h5>
                        </div>
                          <div id="collapsenaturales" class="panel-collapse collapse" aria-labelledby="Sitios Naturales" data-parent="#accordionExample">
                            <div class= "card-body">
                              @foreach ($categoria as $categorias)
                                @foreach ( $categorias->places as $place )
                                    @if ($categorias->id == 2)
                                      @if( $place->category_id == 2)
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
                  <div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
                    <div class="card" style="border-radius: 10px;">
                      <div class="card-header" id="heading" style="background-color: #DCDCDC;">
                          <h4 class="mb-0">
                              Gubernamentales
                          </h4>
                      </div>
                        <div class="card-header shadow" id="gubernamental" role="button" data-toggle="collapse" href="#collapsegubernamentales" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                            <h5 class="panel-title">
                            <a>
                                Sitios Registrados
                            </a>
                            </h5>
                        </div>
                          <div id="collapsegubernamentales" class="panel-collapse collapse" aria-labelledby="Sitios Gubernamentales" data-parent="#accordionExample">
                              <div class= "card-body">
                                  @foreach ($categoria as $categorias)
                                    @foreach ( $categorias->places as $place )
                                    @if ($categorias->id == 3)
                                        @if( $place->category_id == 3)
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
                  <div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
                    <div class="card" style="border-radius: 10px;">
                      <div class="card-header" id="heading" style="background-color: #DCDCDC;">
                        <h4 class="mb-0">
                          Historicos
                        </h4>
                      </div>
                        <div class="card-header shadow" id="historico" role="button" data-toggle="collapse" href="#collapsehistoricos" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                          <h5 class="panel-title">
                            <a>
                              Sitios Registrados
                            </a>
                          </h5>
                        </div>
                        <div id="collapsehistoricos" class="panel-collapse collapse" aria-labelledby="Sitios Historicos" data-parent="#accordionExample">
                          <div class= "card-body">
                              @foreach ($categoria as $categorias)
                                    @foreach ( $categorias->places as $place )
                                      @if ($categorias->id == 4)
                                        @if( $place->category_id == 4 )
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
                  <div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
                    <div class="card" style="border-radius: 10px;">
                      <div class="card-header" id="heading" style="background-color: #DCDCDC;">
                        <h4 class="mb-0">
                          Hoteles
                        </h4>
                      </div>
                        <div class="card-header shadow" id="hoteles" role="button" data-toggle="collapse" href="#collapsehoteles" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                          <h5 class="panel-title">
                            <a>
                              Sitios Registrados
                            </a>
                          </h5>
                        </div>
                        <div id="collapsehoteles" class="panel-collapse collapse" aria-labelledby="Hoteles Registrados" data-parent="#accordionExample">
                            <div class= "card-body">
                                @foreach ($categoria as $categorias)
                                  @foreach ( $categorias->places as $place )
                                    @if ($categorias->id == 5)
                                      @if( $place->category_id == 5 )
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
                </div>                       
              </div>
        </fieldset>
        <fieldset class="border p-4 mt-5">
          <legend  class="text-primary">Crear Banner </legend>
              <div class="form-group">
                  <label for="imagenes">Imagenes</label>
                  <div id="dropzone-routes" class="dropzone form-control"></div>
              </div>
      </fieldset>
        <input type="hidden" id="uuid" name="uuid" value="{{ Str::uuid()->toString()}}">
        <input type="submit" class="btn btn-primary mt-3 d-block" value="Registrar Ruta Turistica">
    </form>
  </div>
</div>

@endsection
