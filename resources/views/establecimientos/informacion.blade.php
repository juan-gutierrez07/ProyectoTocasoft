@extends('layouts.app')
@section('content')
       
<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Titulo</th>
                <th scole="col">Categoría</th>
                <th scole="col">Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($modelos as $establecimiento)
                <tr>
                    <td> {{$establecimiento->name}} </td>
                    <td> {{$establecimiento->category->name}} </td>
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
    
@endsection