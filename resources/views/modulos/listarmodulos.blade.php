@extends('layouts.app')
@section('content')
    <div class="col-md-10 mx-auto bg-white p-3" style="margin-top: 10%;">
            @include('establecimientos.message')
        <div class="card">
            <div class="card-body">
                <table class="table" id="dtable">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th scole="col">Id</th>
                                <th scole="col">Nombre</th>
                                <th scole="col">Contenido</th>
                                <th scole="col">Estado</th>
                                <th scole="col">Acciones</th>
                                
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($modulos as $modulo)
                                    <tr>
                                        <td> {{$modulo->id }}</td>
                                        <td> {{$modulo->name}} </td>
                                        <td> <div class="row-md-4 mb-4"> 
                                            @if($modulo->articles->count()>0)
                                            {{$modulo->articles->count()}} 
                                            @else
                                            {{ $modulo->abous_us->count() }}
                                            @endif

                                            <a  href="{{ route('articles.show',$modulo->id) }}"class="btn btn-outline-info mb-2" style="margin-left:10%;">Ver</a>
                                            </div>
                                        </td>
                                        {{-- <td>
                                            @foreach ($modulo->articles as $contenido)
                                            <div class="row-md-4 mb-4">
                                            {{ $contenido->name }}                                            
                                            <a class="btn btn-secondary mb-2" style="margin-right: 10px;" data-toggle="modal" data-target="#Editar">Edit</a>
                                            </div>
                                            @endforeach 
                                        </td> --}}
                                        <td> 
                                            <div style="@if($modulo->state_publication->status == "PUBLICADO") color:#55C937 ; @else color:#FA0808 ; @endif"

                                                    >
                                                    {{$modulo->state_publication->status}} 
                                            </div>
                                            
                                        </td>
                                        <td class=" row align-items">
                                            <a class="btn btn-dark d-block " style="margin-left: 20%;" data-toggle="modal" data-target="#Editar_{{ $modulo->id }}">Editar</a>
                                        <div class="modal fade" id="Editar_{{ $modulo->id }}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Editar modulo: {{ $modulo->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">×</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                        </div>
                                                        
                                                        <!-- Modal Body -->
                                                        <div class="modal-body">
                                                            <p class="statusMsg"></p>
                                                            <form action="{{ route('modul.update',$modulo->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                        <label for="inputName">Nombre:</label>
                                                                        <input type="text" class="form-control" name="name"value="{{ $modulo->name }}"/>
                                                                    </div>
                                                                <div class="form-group">
                                                                    <label for="inputDescription">Descripcion</label>
                                                                    <textarea class="form-control" name="description">{{ $modulo->description }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputPuntos">Estado:</label>
                                                                    <select  name ="status" class="form-control">
                                                                            @if ($modulo->state_publication->status == "PUBLICADO")
                                                                            <option value="{{ $modulo->state_publication->id }}"> {{ $modulo->state_publication->status }}</option>
                                                                            <option value="2">NO PUBLICADO</option>
                                                                            @else        
                                                                            <option value="{{ $modulo->state_publication->id }}"> {{ $modulo->state_publication->status }}</option>
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