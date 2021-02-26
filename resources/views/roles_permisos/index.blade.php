@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de roles</div>

                <div class="card-body">
                        @can('haveaccess','role.create')
                        <a class="btn btn-primary float-right" href="{{ route('role.create') }}"> Crear</a>
                        @endcan
                        <br>
                        <br>
                        @include('roles_permisos.message')
                    <table class=" table table-hover ">
                        <thead>
                            <tr class="success">
                                <th scope="col">N°</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Description</th>
                                <th scope="col">Full-accesses</th>
                                <th style="position:center">Acciones</th>
            
                            </tr>
                        </thead>
                       
                        <tbody>
                         
                                
                                    @foreach ($roles as $rol)
                                    <tr>
                                    <td>{{ $rol->id }}</td>   
                                    <td>{{ $rol->rolname }}</td>   
                                    <td>{{ $rol->slug }}</td>   
                                    <td>{{ $rol->descripcion }}</td>   
                                    <td>{{ $rol['full-accesses'] }}</td>   
                                    <td>
                                        @can('haveaccess','role.show')
                                        <a class="btn btn-info" href="{{ route('role.show',$rol->id) }}">Ver </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('haveaccess','role.edit')
                                        <a class="btn btn-success" href="{{ route('role.edit',$rol->id) }}">Editar </a>
                                        @endcan    
                                    </td>
                                    <td>
                                        @can('haveaccess','role.index')
                                        <form action ="{{ route('role.destroy',$rol->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"> Eliminar</button>
                                        </form>
                                        @endcan
                                    </td>
                                    </tr>
                                    @endforeach
                                
                            
                        </tbody>
                    </table>
                    {{ $roles->links() }}    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection