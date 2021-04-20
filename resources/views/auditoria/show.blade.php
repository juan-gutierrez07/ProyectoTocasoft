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
                            <th scole="col">Acontecimiento</th>
                            <th scole="col">Usuario</th>
                            <th scole="col">Fecha de realización</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registros as $regristro)
                            <tr>
                                <td> {{$regristro->id }}</td>
                                <td> {{$regristro->detail}} </td>
                                <td> {{$regristro->user}}</td>
                                <td> {{$regristro->created_at}}</td>
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