@extends('layouts.app')
@section('content')
<div class="container">
        @include('establecimientos.message')
    <h1 class="text-center mt-4">Registrar imagenes</h1>
    <div class="mt-5 row justify-content-center">
        <div class="col-md-9 col-xs-12 card card-body">
            <fieldset class="border p-4">
                    <legend class="text-primary">Imagenes ruta</legend>
                    <div class="form-group">
                            <label for="imagenes">Imagenes</label>
                            <div id="dropzone-routes" class="dropzone form-control"></div>
                        </div>
                <input type="hidden" id="uuid" name="uuid" value={{ $nuevo->uuid}}>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3">Terminar</a>
            </fieldset>    
        </div>
    </div>
</div>

@endsection