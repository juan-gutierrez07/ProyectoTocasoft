@extends('layouts.app')
@section('content')
    <div class="col-md-10 mx-auto bg-white p-3" style="margin-top: 10%;">
        <div class="card">
            <div class="card-body">
                <table class="table" id="dtable">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th scole="col">Id</th>
                                <th scole="col">Nombre</th>
                                <th scole="col">Contenido</th>
                                <th scole="col">Acciones</th>
                                
                            </tr>
                        </thead>
            
                            <tbody>
                                @foreach ($modulos as $modulo)
                                    <tr>
                                        <td> {{ $modulo->id }}</td>
                                        <td> {{$modulo->name}} </td>
                                        <td> {{ $modulo->articles->count() }}</td>
                                        <td class=" row align-items">
                                            <a class="btn btn-success mb-2" style="margin-right: 10px;" data-toggle="modal" data-target="#Agregar">Agregar</a>
                                            <a href="" class="btn btn-danger mb-2" style="margin-right: 10px;"> Eliminar</a>
                                            <a href="" class="btn btn-dark d-block mb-2" style="margin-right: 10px;">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>    
            </div>
        </div>
    </div>
    <div class="modal fade" id="Agregar" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                
                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="statusMsg"></p>
                    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Nombre</label>
                            <input type="text" class="form-control" name="name" id="inputName" placeholder="Enter your name"/>
                        </div>
                        <div class="form-group">
                            <label for="inputMessage">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="inputMessage" placeholder="Enter your message"></textarea>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <a class="btn btn-danger" data-dismiss="modal">Close</a>
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