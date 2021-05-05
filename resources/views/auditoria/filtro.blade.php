@extends('layouts.app')
@section('content')

<legend class="text-center text-primary text-bold my-2">Auditoria de sistemas.</legend>
@include('establecimientos.message')

<div class="col-md-11 mx-auto bg-white p-3">
<div class="row">
    <a class="btn btn-success m-3"  href="{{ route('descargar') }}">Realizar Backup</a>
</div>
<form class="align-items-end"  action="{{ route('auditoria.fechas') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <label for="fechainicio">Fecha inicio</label> 
        <input type="date" name="fechainicio"/>   
        <label for="fechainicio">Fecha final</label> 
        <input type="date" name="fechafinal"/>   
        <input  class="btn btn-primary mb-1" style="border-radius: 50%"  type="submit" value="Buscar"/>
</form>
    <div class="card">
        <div class="card-body">
            <table class="table" id="dtable">
                <thead class="bg-primary text-light">
                    <tr>
                        <th scole="col">Id</th>
                        <th scole="col">Acontecimiento</th>
                        <th scole="col">Usuario</th>
                        <th scole="col">Fecha de realización</th>
                        
                    </tr>
                </thead>
                <tbody>
                        @foreach ($filtros as $filtro)
                            <tr>
                                <td> {{$filtro->id }}</td>
                                <td> {{$filtro->detail}} </td>
                                <td> {{$filtro->user}}</td>
                                <td> {{$filtro->created_at}}</td>
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