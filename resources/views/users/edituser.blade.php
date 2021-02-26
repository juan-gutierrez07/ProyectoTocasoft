@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form  class="col-md-9 col-xs-12 card card-body"  method="POST"  action="{{ route('user.update',$user->id) }}">
                @csrf
                @method('PUT')
                @include('roles_permisos.message')
                    <fieldset class="border p-4">
                        <legend class="text-primary">Editar Usuario  {{ $user->name }}</legend>
                                                               
                        <div class="form-group">
                                <div class="form-group">                            
                                        <label for="name">Nombre del Usuario</label>    
                                    <input type="text" class="form-control" 
                                        id="name" 
                                        placeholder="Name"
                                        name="name"
                                        value="{{ old('name', $user->name)}}"
                                        >
                                      </div>
                                <div class="form-group">    
                                        <label for="email">Email</label>                         
                                            <input type="text" 
                                            class="form-control" 
                                            id="email" 
                                            placeholder="email"
                                            name="email"
                                            value="{{ old('email' , $user->email)}}"
                                            >
                                </div>   
                                <div class="form-group">           
                                        <label>Seleccione un rol</label>                    
                                    <select  class="form-control"  name="roles" id="roles">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}"
                                        @isset($user->roles[0]->rolname)
                                            @if($role->rolname ==  $user->roles[0]->rolname)
                                                selected
                                            @endif
                                        @endisset>
                                        {{ $role->rolname }}</option>
                              @endforeach
                            </select>
                          </div>

                          
                          <hr>
                          <input class="btn btn-primary" type="submit" value="Guardar">
                    </fieldset>
            </form>
        </div>        
    </div>
</div>
@endsection
