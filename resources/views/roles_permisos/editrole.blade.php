@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form  class="col-md-9 col-xs-12 card card-body"  method="POST"  action="{{ route('role.update',$role->id) }}">
                @csrf
                @method('PUT')
                @include('roles_permisos.message')
                    <fieldset class="border p-4">
                        <legend class="text-primary">Editar rol {{ $role->rolname }}</legend>
                                                               
                        <div class="form-group">
                            <label for="nombre">Nombre del rol</label>
                            <input
                                id="rolname"
                                type="text"
                                class="form-control"
                                placeholder="Nombre del rol"
                                name="rolname"
                                value="{{ old('rolname', $role->rolname) }}">
                                <br>
                           
                            <div class="form-group">
                                <label for="full-accesses">Acceso total:</label>
                                
                                <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="fullaccessyes" name="full-accesses" class="custom-control-input" value="yes"
                                        @if ( $role['full-accesses']=="yes") 
                                             checked 
                                        @elseif (old('full-accesses')=="yes") 
                                            checked 
                                        @endif >
                            
                                        <label class="custom-control-label" for="fullaccessyes">Yes</label>
                                </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="fullaccessno" name="full-accesses" class="custom-control-input" value="no"
                                        @if ( $role['full-accesses']=="no") 
                                            checked 
                                        @elseif (old('full-accesses')=="no") 
                                        checked 
                                        @endif
                                        >
                                        <label class="custom-control-label" for="fullaccessno">No</label>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea id="descripcion"
                                class="form-control"
                                name="descripcion">{{ old('descripcion',$role->descripcion)}}</textarea>

                                
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
                            @elseif( is_array($permission_role) && in_array("$permission->id",$permission_role)    )
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
                          <input type="submit" class="btn btn-primary" value="Actualizar"> 
                        </fieldset>
                        
                    </div>        
            </form>
        </div>
    </div>
</div>
@endsection
