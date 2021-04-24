@extends('layouts.app')

@section('styles')
<link
rel="stylesheet"
href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css"
/>
@endsection
@section('content')
<div class="container">
        @include('establecimientos.message')
        <div class="container">
                <h1 class="text-center mt-4">Editar Establecimiento {{ $place->name }}</h1>
       
                <div class="mt-5 row justify-content-center">
                    <form
                        class="col-md-9 col-xs-12 card card-body"
                        action="{{ route('place.update',$place->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                    @csrf
                        <fieldset class="border p-4">
                            <legend class="text-primary">Nombre, Categoría e Imagen Principal</legend>
        
                            <div class="form-group">
                                <label for="nombre">Nombre Establecimiento</label>
                                <input
                                    id="nombre"
                                    type="text"
                                    class="form-control @error('nombre') is-invalid @enderror "
                                    placeholder="Nombre Establecimiento"
                                    name="name"
                                    value="{{ $place->name }}"
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
                                >
                                    <option value="{{ $place->id }}">{{ $place->category->name }}</option>
        
                                    @foreach ($categorys as $category)
                                        <option
                                            value="{{$category->id}}"
                                            {{ old('categoria_id') == $category->id  ? 'selected' : '' }}
                                        >{{$category->name}}</option>
        
                                    @endforeach
                                </select>
                                @error('categoria_id')
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
                                    value="{{  $place->imagen_principal }}"
                                >
        
                                @error('imagen_principal')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                                <img style="width:200px; margin-top: 20px;" src="/storage/{{ $place->imagen_principal }}">        
                            </div>
                            
                        </fieldset>
        
                        <fieldset class="border p-4 mt-5">
                            <legend class="text-primary">Ubicación:</legend>
        
                            <div class="form-group">
                                <center><label>Puede modificar las coordenadas..</label></center>
                                {{-- <input
                                    id="formbuscar"
                                    type="text"
                                    placeholder="Dirección"
                                    class="form-control"
                                > 
                                
                                <input
                                    id="lngbuscar"
                                    type="text"
                                    placeholder="Longitud"
                                    class="form-control"
                                > --}}
                                <p class="text-secondary mt-5 mb-3 text-center">El asistente colocará una dirección estimada o mueve el Pin hacia el lugar correcto</p>
                            </div>
        
                            <div class="form-group">
                                <div id="mapasitio" style="height: 400px;"></div>
                            </div>
                                <p class="informacion">Confirma que los siguientes campos son correctos</p>
        
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
        
                                <input
                                    type="text"
                                    id="direccion"
                                    class="form-control @error('direccion') is-invalid @enderror"
                                    placeholder="Dirección"
                                    value="{{  $place->direccion }}"
                                    name="direccion"
                                >
                            </div>
                            <div class="form-group">
                            <input class="form-control" type="text" id="lat" name="lat" value="{{ $place->lat}}" placeholder="Latitud">
                            <br>
                            <input class="form-control" type="text" id="lng" name="lng" value="{{ $place->lng }}" placeholder="Longitud">
                            </div>
                        </fieldset>
        
                        <fieldset class="border p-4 mt-5">
                            <legend  class="text-primary">Información Establecimiento: </legend>
                                <div class="form-group">
                                    <label for="nombre">Teléfono</label>
                                    <input
                                        type="text"
                                        class="form-control @error('telefono')  is-invalid  @enderror"
                                        id="telefono"
                                        placeholder="Teléfono Establecimiento"
                                        name="telefono"
                                        value="{{ $place->telefono }}"
                                        onkeypress="return valideKey(event);">
        
                                        @error('telefono')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                </div>
        
        
        
                                <div class="form-group">
                                    <label for="nombre">Descripción</label>
                                    <textarea
                                        class="form-control  @error('descripcion')  is-invalid  @enderror"
                                        name="descripcion"
                                    >{{ $place->descripcion }}</textarea>
        
                                        @error('descripcion')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="nombre">Hora Apertura:</label>
                                    <input
                                        type="time"
                                        class="form-control @error('apertura')  is-invalid  @enderror"
                                        id="apertura"
                                        name="apertura"
                                        value="{{ $place->apertura }}"
                                    >
                                    @error('apertura')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="nombre">Hora Cierre:</label>
                                    <input
                                        type="time"
                                        class="form-control @error('cierre')  is-invalid  @enderror"
                                        id="cierre"
                                        name="cierre"
                                        value="{{ $place->cierre }}"
                                    >
                                    @error('cierre')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
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
                                                    <eliminar-imagen-sitio imagen-id= {{ $imagen->id }}></eliminar-imagen-sitio>
                                                {{-- <a class=" btn btn-danger" id="eliminar">Eliminar</a> --}}
                                                </div>
                                            </div>  
                                        </div>
                                    @endforeach
                                </div>   
                        </fieldset>        
                        <input type="hidden" id="uuid" name="uuid" value="{{ $place->uuid }}">    
                   <input type="submit" class="btn btn-primary mt-3 d-block" value="Editar Sitio">
        
        
                    </form>
                </div>
            </div>
        

</div>

@endsection
<script>
    function valideKey(evt){
        
        // code is the decimal ASCII representation of the pressed key.
        var code = (evt.which) ? evt.which : evt.keyCode;
        
        if(code==8) { // backspace.
          return true;
        } else if(code>=48 && code<=57) { // is a number.
          return true;
        } else{ // other keys.
          return false;
        }
    }
    </script> 
