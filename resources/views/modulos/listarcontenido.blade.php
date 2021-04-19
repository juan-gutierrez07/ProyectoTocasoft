@extends('layouts.app')
@section('content')
<div class="col-md-10 mx-auto bg-white p-3" style="margin-top: 5%;">
    <br>
    @include('establecimientos.message')
<a class="btn btn-success mb-2" style="margin-left: 90%;" data-toggle="modal" data-target=" @if($modul->slug=="sitios")@if($disponibles->count()>0)#Agregar @else #Noacces @endif @elseif($modul->slug !="sitios")  #Agregar @endif">Agregar</a>
<div class="card">
    <div class="card-body">
    <table class="table" id="dtable">
        <thead class="bg-secondary text-light">
            <tr>
                <th scole="col">Id</th>
                <th scole="col">Nombres</th>
                @if($modul->slug=="personal") <th scole="col">Apellidos</th> @endif
                <th scole="col">@if($modul->slug=="sitios")Descripción @elseif($modul->slug=="personal") Cargo @endif</th>
                @if($modul->slug=="personal") <th scole="col">Celular</th> @endif
                @if($modul->slug=="personal") <th scole="col">Correo</th> @endif
                @if($modul->slug !="personal")<th scole="col">Estado</th>@endif
                <th scole="col">Acciones</th>

            </tr>
        </thead>
            @if($modul->slug !="personal")
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
                                                    <h5 class="text-center">Imagen actual</h5>
                                                    <img style="width:200px; margin-top: 20px;" src="../storage/{{ $article->image_location }}">               
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
            @elseif($modul->slug=="personal")
                <tbody>
                    @foreach ($personal as $persona)
                        <tr>
                            <td>{{ $persona->id }}</td>
                            <td>{{ $persona->name }}</td>
                            <td>{{ $persona->lastname }}</td>
                            <td>{{ $persona->position }}</td>
                            <td style="width: 10%;">{{ $persona->phone }}</td>
                            <td>{{ $persona->email }}</td>
                            <td class=" row align-items">
                                <a class="btn btn-dark d-block mb-2" style="margin-left: 20%;" data-toggle="modal" data-target="#Editar_{{ $persona->id }}">Editar</a>
                                <a class="btn btn-danger d-block mb-2" style="margin-left: 20%;" >Eliminar</a>
                                <div class="modal fade" id="Editar_{{ $persona->id }}" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Editar contenido {{ $persona->name }} {{ $persona->lastname }}</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">×</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                            
                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                            <p class="statusMsg"></p>
                                            <form action="{{ route('aboutus.update',$persona->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf 
                                                        <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="txtName"> Nombres:</label>
                                                            <input class="form-control"  name="name" type="text"  value="{{ $persona->name }}">
                                                            </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="txtName"> Apellidos:</label>
                                                            <input class="form-control"  name="lastname" type="text"  value="{{ $persona->lastname }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="txtName"> Cargo:</label>
                                                            <textarea class="form-control" name="position">{{ $persona->position }}"</textarea>
                                                        </div>     
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                    <label for="txtName"> Telefono:</label>
                                                                    <input class="form-control"  name="phone" type="text"  value="{{ $persona->phone }}"onkeypress="return valideKey(event);">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                    <label for="phone"> Email:</label>
                                                                    <input class="form-control"  name="phone" type="text" value="{{ $persona->email }}">
                                                            </div>  
                                                        </div>
                                                    
                                                        <div class="form-group">
                                                            <label for="imagen_principal">Imagen Principal</label>
                                                            <input 
                                                            type="file"
                                                            class="form-control"
                                                            name="imagen_principal"> 
                                                            <h5 class="text-center">Imagen actual</h5>
                                                            <img style="width:200px; margin-top: 20px;" src="../storage/{{ $persona->imagen_location }}">            
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endif
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
                <form action="@if($modul->slug != "personal") {{ route('articles.store',$modul->id) }}@else {{ route('aboutus.store',$modul->id) }} @endif" method="POST" enctype="multipart/form-data">
                    @csrf 
                        @if($modul->slug == "sitios")
                        <div class="form-group">
                        <label for="slug"> Nombre:</label>
                        <select  name ="name" id="slug" class="form-control">
                            <option value="0">--------</option>
                            @foreach ($disponibles as $categoria)
                            <option value={{ $categoria->slug }}>{{ $categoria->slug }}</option>
                            @endforeach
                        </select>
                        </div>
                        @elseif($modul->slug == "personal")
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtName"> Nombres:</label>
                            <input class="form-control"  name="name" type="text" placeholder="Nombres">
                          </div>
                        <div class="form-group col-md-6">
                            <label for="lastname"> Apellidos:</label>
                            <input class="form-control"  name="lastname" type="text" placeholder="Apellidos">
                          </div>
                        </div>
                        <div class="form-group">
                
                                <label for="position"> Cargo:</label>
                                <textarea class="form-control" name="position" placeholder="Ingresa nombre del cargo y descripción"></textarea>
                        </div>     
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="phone"> Telefono:</label>
                                    <input class="form-control"  name="phone" type="text" placeholder="Numero" onkeypress="return valideKey(event);">
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="email"> Email:</label>
                                    <input class="form-control"  name="email" type="text" placeholder="Email">
                            </div>  
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="imagen_principal">Imagen Principal</label>
                        <input 
                        type="file"
                        class="form-control"
                        name="imagen_principal">     
                    </div>          
                    @if($modul->slug != "personal")  
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
                    @endif
                
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
                    <a class="btn btn-link" href="{{ route('place.list') }}"> Ir a crear</a>
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
    
@endsection
<script>
        function valideKey(evt){
            
            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;
            
            if(code==8) { // backspace.
              return true;
            } else if(code>=48 && code<=57) { // is a number.
              return true;
            } else{ // other keys.
              return false;
            }
        }
        </script> 
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

@endsection