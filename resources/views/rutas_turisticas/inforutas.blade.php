@extends('layouts.app')
@section('content')
@include('establecimientos.message')
<div class="col-md-10 mx-auto bg-white p-3">

    <fieldset class="border p-4">
            <legend class="text-primary text-center mt-4">Información de sitios por categorias.</legend>   
        <div class="container-lg my-4">
                <a class="btn btn-outline-success mb-2" style="margin-left: 80%;" data-toggle="modal" data-target="#Agregar">Añadir categoria</a>
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
                        Sitios {{ $categorias->name }} 
                        </a>
                        </h5>
                    </div>
                    <div class="modal fade" id="Editar_{{ $categorias->id }}" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Editar Categoria {{ $categorias->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">×</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                
                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p class="statusMsg"></p>
                                    <form action="{{ route('category.update',$categorias->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="slug"> Nombre:</label>
                                            <input class= "form-control" name="name" type="text" value={{ $categorias->name }}>
                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" data-dismiss="modal">Cerrar</a>
                                            <input type="submit" class="btn btn-primary" value="Editar"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        {{-- fin de la modal --}}
                    <div id="collapse_{{ $categorias->id }}" class="panel-collapse collapse" aria-labelledby="Sitios {{ $categorias->name }}" data-parent="#accordionExample_{{ $categorias->id}}">
                        <div class="card">
                                <a class="btn btn-outline-primary mb-2" style="margin-left: 80%;" data-toggle="modal" data-target="#Editar_{{ $categorias->id }}">Editar Categoria</a>
                            <div class="card-body">
                                <table class="table" id="dtable">
                                        <thead class="bg-primary text-light">
                                            <tr>
                                                <th scole="col">Id</th>
                                                <th scole="col">Nombre</th>
                                                <th scole="col">Tiempo de recorrido</th>
                                                <th scole="col">Descripcion</th>
                                                <th scole="col">Acciones</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                            
                                                @foreach ($categorias->routeturist as $ruta)
                                                    <tr>
                                                        <td> {{ $ruta->id }}</td>
                                                        <td> {{$ruta->name}} </td>
                                                        <td> {{ $ruta->time_travel }}</td>
                                                        <td> {{ $ruta->description }}</td>
                                                        <td>
                            
                                                            <eliminar-rutas rutas-id ={{$ruta->id }}></eliminar-rutas>
                                                            <a href="{{ route('place.edit', $ruta->id) }} " class="btn btn-dark d-block mb-2">Editar</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                @endforeach  
            </div>                       
        </div>
    </fieldset>   
</div>
<div class="modal fade" id="Agregar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Agregar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="slug"> Nombre:</label>
                        <input class= "form-control" name="name" type="text" placeholder="Ingrese un nombre..">
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <a class="btn btn-danger" data-dismiss="modal">Cerrar</a>
                        <input type="submit" class="btn btn-primary" value="Agregar"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection
    
    