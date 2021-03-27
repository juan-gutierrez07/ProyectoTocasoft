@extends('layouts.app')
@section('content')
    <div class="col-md-10 mx-auto bg-white p-3">
        <div class="card">
            <div class="card-body">
                <table class="table" id="dtable">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th scole="col">Id</th>
                                <th scole="col">Nombre</th>
                                <th scole="col">Categoría</th>
                                <th scole="col">Telefono</th>
                                <th scole="col">Acciones</th>
                            </tr>
                        </thead>
            
                            <tbody>
            
                                @foreach ($modelos as $establecimiento)
                                    <tr>
                                        <td> {{ $establecimiento->id }}</td>
                                        <td> {{$establecimiento->name}} </td>
                                        <td> {{$establecimiento->category->name}} </td>
                                        <td> {{ $establecimiento->telefono }}</td>
                                        <td>
            
                                            <eliminar-establecimiento
                                                establecimiento-id={{$establecimiento->id}}
                                            ></eliminar-establecimiento>
                                            <a href="{{ route('place.edit', $establecimiento->id) }} " class="btn btn-dark d-block mb-2">Editar</a>
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

