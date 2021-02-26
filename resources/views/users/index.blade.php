@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de usuarios</div>

                <div class="card-body">
               
                        
                        <br>
                        <br>
                        @include('roles_permisos.message')
                    <table class=" table table-hover ">
                        <thead>
                            <tr class="success">
                                <th scope="col">N°</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rol</th>
                                <th style="position:center">Acciones</th>
            
                            </tr>
                        </thead>
                       
                        <tbody>
                         
                                   
                                    @foreach ($user as $us)
                                    <tr>
                                    <td>{{ $us->id }}</td>   
                                    <td>{{ $us->name }}</td> 
                                    <td>{{ $us['email'] }}</td> 
                                    <td>
                                        @isset($us->roles[0]->rolname)
                                        {{ $us->roles[0]->rolname }}
                                    @endisset
                                    </td>
                                    <td>
                                            @can('view',[$us,['user.show','userown.show']])
                                        <a class="btn btn-info" href="{{ route('user.show',$us->id) }}">Ver</a>
                                            @endcan
                                    </td>
                                    <td>
                                            @can('view',[$us,['user.edit','userown.edit']])
                                        <a class="btn btn-success" href="{{ route('user.edit',$us->id) }}">Editar</a>
                                            @endcan
                                    </td>
                                    <td>
                                            @can('haveaccess','user.destroy')
                                        <form action ="{{ route('user.destroy',$us->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Eliminar</button>
                                        </form>
                                             @endcan
                                    </td>
                                    </tr>
                                    @endforeach
                                
                            
                        </tbody>
                    </table>
                    
                    {{ $user->links() }}    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection