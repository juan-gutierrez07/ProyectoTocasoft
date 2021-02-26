@extends('layouts.app')

@section('content')

<center>
<table class=" table table-hover " style="width: 50%;
	height:60%; ">
                        <thead>
                            <tr class="success">
                                <th scope="col">N°</th>
                                <th scope="col">Name</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Description</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Imagen Principal</th>
                                <th style="position:center;">Acciones</th>
            
                            </tr>
                        </thead>
                       
                        <tbody>
                         
                                
                                    @foreach ($modelos as $model)
                                    <tr>
                                    <td>{{$model->id}}</td>   
                                    <td>{{$model->name}}</td>   
                                    <td>{{$modelos[0]->category->name}}</td>   
                                    <td>{{$model->descripcion}}</td>   
                                    <td>{{$model->direccion}}</td>   
                                    <td><img src="{{ asset("storage/app/public/$model->imagen_principal" )}}" alt="" /></td>   
                                    <td>
                                        <a class="btn btn-info" href="">Ver </a><br>
                                        <a class="btn btn-success" href="">Editar </a>    
                                        <form  method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"> Eliminar</button>
                                        </form>
                                    </td>
                                    </tr>
                                    @endforeach
                                
                            
                        </tbody>
                    </table>
    <center>
@endsection