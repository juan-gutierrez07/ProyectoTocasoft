@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form  class="col-md-9 col-xs-12 card card-body"  method="POST"  action="{{ route('role.store') }}">
                @csrf
                @include('roles_permisos.message')
                    <fieldset class="border p-4">
                        <legend class="text-primary">Crear Nuevo Rol</legend>

                        <div class="form-group">
                            <label for="nombre">Nombre del rol</label>
                            <input
                                id="rolname"
                                type="text"
                                class="form-control"
                                placeholder="Nombre del rol"
                                name="rolname"
                                value="{{ old('rolname') }}">
                                <br>
                                <div class="form-group">
                                    <label for="nombre">Nombre del Slug</label>
                                    <input
                                    id="slug"
                                    type="text"
                                    class="form-control"
                                    placeholder="Slug"
                                    name="slug"
                                    value="{{ old('slug') }}">
                                </div>
                            <div class="form-group">
                                <label for="full-accesses">Acceso total:</label>
                                
                                <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="fullaccessyes" name="full-accesses" class="custom-control-input" value="yes">
                                        <label class="custom-control-label" for="fullaccessyes">Yes</label>
                                </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="fullaccessno" name="full-accesses" class="custom-control-input" value="no">
                                        <label class="custom-control-label" for="fullaccessno">No</label>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea id="descripcion"
                                class="form-control"
                                name="descripcion">
                                {{ old('descripcion')}}
                                </textarea>

                                
                            </div>
                        </div>
                       
                            

                        </fieldset>
                        <fieldset class="border p-4">
                    
                                <legend class="text-primary">Lista de permisos</legend>
                        @foreach($permissions as $permission)
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" 
                            class="custom-control-input" 
                            id="permission_{{$permission->id}}"
                            value="{{$permission->id}}"
                            name="permission[]"
                            @if( is_array(old('permission')) && in_array("$permission->id", old('permission'))    )
                            checked
                            @endif
                            >

                            <label class="custom-control-label" 
                                for="permission_{{$permission->id}}">
                                {{ $permission->id }}
                                ->
                                {{ $permission->name }} 
                                <em>( {{ $permission->description }} )</em>
                            
                            </label>
                          </div>


                          @endforeach
                          <br>
                          <input type="submit" class="btn btn-primary" value="Crear"> 
                        </fieldset>
                        
                    </div>        
            </form>
        </div>
    </div>
</div>
@endsection
