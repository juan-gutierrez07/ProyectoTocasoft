@extends('layouts.app')

@section('styles')
<link
rel="stylesheet"
href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css"
/>
@endsection
@section('content')
    <div class="container">
                <h1 class="text-center mt-4">Registrar Sitio</h1>
       
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
                            <legend class="text-primary">Nombre, Categoría e Imagen Principal</legend>
        
                            <div class="form-group">
                                <label for="nombre">Nombre Sitio</label>
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
        
                                    @foreach ($places as $place)
                                        <option
                                            value="{{$place->id}}"
                                            {{ old('categoria_id') == $place->id  ? 'selected' : '' }}
                                        >{{$place->name}}</option>
        
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
                                    value="{{ old('imagen_principal') }}"
                                    required
                                >
        
                                @error('imagen_principal')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
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
                                <div id="map" style="height: 400px;"></div>
                            </div>
                                <p class="informacion">Confirma que los siguientes campos son correctos</p>
        
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
        
                                <input
                                    type="text"
                                    id="direccion"
                                    class="form-control @error('direccion') is-invalid @enderror"
                                    placeholder="Dirección"
                                    value="{{old('direccion')}}"
                                    name="direccion"
                                    required
                                >
                            </div>
                            <div class="form-group">
                            <input class="form-control" type="text" id="lat" name="lat" value="{{old('lat')}}" placeholder="Latitud">
                            <br>
                            <input class="form-control" type="text" id="lng" name="lng" value="{{old('lng')}}" placeholder="Longitud">
                            </div>
                        </fieldset>
        
                        <fieldset class="border p-4 mt-5">
                            <legend  class="text-primary">Información Establecimiento: </legend>
                                <div class="form-group">
                                    <label for="nombre">Teléfono</label>
                                    <input
                                        type="tel"
                                        class="form-control @error('telefono')  is-invalid  @enderror"
                                        id="telefono"
                                        placeholder="Teléfono Establecimiento"
                                        name="telefono"
                                        value="{{ old('telefono') }}"
                                        required
                                    >
        
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
                                        required >{{ old('descripcion') }}</textarea>
        
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
                                        value="{{ old('apertura') }}"
                                        required
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
                                        value="{{ old('cierre') }}"
                                        required
                                    >
                                    @error('cierre')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                        </fieldset>
        
                        {{-- <fieldset class="border p-4 mt-5">
                            <legend  class="text-primary">Imágenes Establecimiento: </legend>
                                <div class="form-group">
                                    <label for="imagenes">Imagenes</label>
                                    <div id="dropzone" class="dropzone form-control"></div>
                                </div>
                        </fieldset> --}}
        
                        <input type="hidden" id="uuid" name="uuid" value="{{ Str::uuid()->toString()}}">
                        <input type="submit" class="btn btn-primary mt-3 d-block" value="Registrar Establecimiento">
        
        
            </form>
        </div>
    </div>
@endsection

