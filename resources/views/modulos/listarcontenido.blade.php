@extends('layouts.app')
@section('content')
<div class="col-md-10 mx-auto bg-white p-3" style="margin-top: 5%;">
    @include('establecimientos.message')
<a class="btn btn-success mb-2" style="margin-left: 90%;" data-toggle="modal" data-target=" @if($bandera == 1)@if($disponibles->count()>0)#Agregar @else #Noacces @endif @elseif($bandera == 2)  #Agregar @endif">Agregar</a>
<div class="card">
    <div class="card-body">
    <table class="table" id="dtable">
        <thead class="bg-secondary text-light">
            <tr>
                <th scole="col">Id</th>
                <th scole="col">Nombre</th>
                @if($modul->slug=="personal") <th scole="col">Imagen</th> @endif
                <th scole="col">@if($modul->slug=="sitios")Descripción @elseif($modul->slug=="personal") Cargo @endif</th>
                @if($modul->slug=="personal") <th scole="col">Celular</th> @endif
                @if($modul->slug=="personal") <th scole="col">Correo</th> @endif
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
                            <div style="@if($article->state_publication->status == "PUBLICADO") color:#55C937 ; @else color:#FA0808 ; @endif">
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
                                            <form action="{{ route('article.update',$article->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="slug"> Nombre:</label>
                                                    <select  name ="name" id="slug_{{$article->id }}" class="form-control">
                                                        <option value={{ $article->slug }}>{{ $article->slug }}</option>
                                                        @foreach ($disponibles as $categoria)
                                                        <option value={{ $categoria->slug }}>{{ $categoria->slug }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="imagen_principal">Imagen Principal</label>
                                                    <input id="imagen_principal_{{$article->id }}"
                                                    type="file"
                                                    class="form-control"
                                                    name="imagen_principal">     
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
<div class="modal fade" id="Agregar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar contenido al modulo {{$modul->name}}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="{{ route('articles.store',$modul->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($bandera == 1)
                    <div class="form-group">
                        <label for="slug"> Nombre:</label>
                        <select  name ="name" id="slug" class="form-control">
                            <option value="0">--------</option>
                            @foreach ($disponibles as $categoria)
                            <option value={{ $categoria->slug }}>{{ $categoria->slug }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="imagen_principal">Imagen Principal</label>
                        <input id="imagen_principal"
                        type="file"
                        class="form-control"
                        name="imagen_principal">     
                    </div>            
                    <div class="form-group">
                        <label for="inputDescription">Descripcion</label>
                        <textarea class="form-control" name="description" placeholder="Ingresa el contenido.."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputPuntos">Estado:</label>
                        <select  name ="status" class="form-control">
                                <option value="">----------</option>
                                @foreach($estados as $estado)
                                <option value="{{ $estado->id }}"> {{ $estado->status }}</option>
                                @endforeach
                        </select>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <a class="btn btn-danger" data-dismiss="modal">Cerrar</a>
                        <input type="submit" class="btn btn-primary" value="Crear"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Noacces" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Acción denegada</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p>
                    No puedes agregar más contenido sin categorias existentes !
                    <a class="btn btn-link"> Crear Categoria</a>
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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