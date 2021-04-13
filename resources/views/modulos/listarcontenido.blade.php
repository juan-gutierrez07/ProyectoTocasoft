@extends('layouts.app')
@section('content')
    <div class="col-md-10 mx-auto bg-white p-3" style="margin-top: 5%;">
            @include('establecimientos.message')
            <a class="btn btn-success mb-2" style="margin-left: 90%;" data-toggle="modal" data-target="#Agregar">Agregar</a>
        <div class="card">
            <div class="card-body">
                <table class="table" id="dtable">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th scole="col">Id</th>
                                <th scole="col">Nombre</th>
                                <th scole="col">Descripción</th>
                                <th scole="col">Estado</th>
                                <th scole="col">Acciones</th>

                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($modul->articles as $article)    
                                    <tr>
                                        <td> {{$article->id }}</td>
                                        <td> {{$article->name}} </td>
                                        <td> <div class="row-md-4 mb-4">
                                            {{$article->description}}
                                        </div>
                                        </td>
                                        <td>
                                            <div style="@if($article->state_publication->status == "PUBLICADO") color:#55C937 ; @else color:#FA0808 ; @endif"

                                                    >
                                                    {{$article->state_publication->status}}
                                            </div>

                                        </td>
                                        <td class=" row align-items">
                                            <a class="btn btn-dark d-block mb-2" style="margin-left: 20%;" data-toggle="modal" data-target="#Editar_{{ $article->id }}">Editar</a>
                                            <div class="modal fade" id="Editar_{{ $article->id }}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Editar contenido {{ $article->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                        </div>
                                        
                                                        <!-- Modal Body -->
                                                        <div class="modal-body">
                                                            <p class="statusMsg"></p>
                                                            <form action="{{ route('modul.update',$article->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                        <label for="inputName">Nombre:</label>
                                                                        <input type="text" class="form-control" name="name"value="{{ $article->name }}"/>
                                                                    </div>
                                                                <div class="form-group">
                                                                    <label for="inputDescription">Descripcion</label>
                                                                    <textarea class="form-control" name="description">{{ $article->description }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputPuntos">Estado:</label>
                                                                    <select  name ="status" class="form-control">
                                                                            @if ($article->state_publication->status == "PUBLICADO")
                                                                            <option value="{{ $article->state_publication->id }}"> {{ $article->state_publication->status }}</option>
                                                                            <option value="2">NO PUBLICADO</option>
                                                                            @else
                                                                            <option value="{{ $article->state_publication->id }}"> {{ $article->state_publication->status }}</option>
                                                                            <option value="1">PUBLICADO</option>
                                                                            @endif
                                                                    </select>
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
                                        </td>
                                    </tr>    
                                @endforeach    
                            </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

@endsection