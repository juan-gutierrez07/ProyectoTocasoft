@extends('layouts.app')
@section('content')
<div class="container-lg my-4">

        <div class="container">
                <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Crear Ruta</li>
                     </ol>
                 </nav>
             @include('establecimientos.message')
             <div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
               <div class="card" style="border-radius: 10px;">
                 <div class="card-header" id="heading" style="background-color: #DCDCDC;">
                   <h4 class="mb-0">
                     Cultural
                   </h4>
                 </div>
                   <div class="card-header shadow" id="peso" role="button" data-toggle="collapse" href="#collapsecultural" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                     <h5 class="panel-title">
                       <a>
                        Sitios Registrados
                       </a>
                     </h5>
                   </div>
                   <div id="collapsecultural" class="panel-collapse collapse" aria-labelledby="Sitios Culturales" data-parent="#accordionExample">
                      <div class= "card-body">
                          @foreach ($categoria as $categorias)
                          @foreach ( $categorias->places as $place )
                            @if ($categorias->id == 1)
                              @if($place->category_id == 1)
                                <h2>{{ $place->name }}</h2>
                              @endif
                            @endif
                          @endforeach    
                     @endforeach
                      </div>
              </div>
               </div>
             </div>
             
             <div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
                    <div class="card" style="border-radius: 10px;">
                      <div class="card-header" id="heading" style="background-color: #DCDCDC;">
                        <h4 class="mb-0">
                          Naturales
                        </h4>
                      </div>
                        <div class="card-header shadow" id="peso" role="button" data-toggle="collapse" href="#collapsenaturales" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                          <h5 class="panel-title">
                            <a>
                             Sitios Registrados
                            </a>
                          </h5>
                        </div>
                        <div id="collapsenaturales" class="panel-collapse collapse" aria-labelledby="Sitios Naturales" data-parent="#accordionExample">
                            <div class= "card-body">
                                @foreach ($categoria as $categorias)
                                @foreach ( $categorias->places as $place )
                                  @if ($categorias->id == 2)
                                    @if( $place->category_id == 2)
                                   {{  array_push($nombres,$place->name)}}
                                    @endif
                                  @endif
                                @endforeach    
                           @endforeach
                                  <div class="mb-5">
                                  <sitios-rutas :sitios="{{json_encode($nombres)}}">
                                  </sitios-rutas>
                                </div>
                      </div>
                    </div>
                    </div>
                  </div>
        <div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header" id="heading" style="background-color: #DCDCDC;">
                    <h4 class="mb-0">
                        Gubernamentales
                    </h4>
                    </div>
                    <div class="card-header shadow" id="peso" role="button" data-toggle="collapse" href="#collapsegubernamentales" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                        <h5 class="panel-title">
                        <a>
                            Sitios Registrados
                        </a>
                        </h5>
                    </div>
                    <div id="collapsegubernamentales" class="panel-collapse collapse" aria-labelledby="Sitios Gubernamentales" data-parent="#accordionExample">
                        <div class= "card-body">
                            @foreach ($categoria as $categorias)
                            @foreach ( $categorias->places as $place )
                              @if ($categorias->id == 3)
                                @if( $place->category_id == 3)
                             
                                @endif
                              @endif
                            @endforeach    
                       @endforeach
                  </div>
                </div>
                </div>
                </div>
                
                <div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
                        <div class="card" style="border-radius: 10px;">
                          <div class="card-header" id="heading" style="background-color: #DCDCDC;">
                            <h4 class="mb-0">
                              Historicos
                            </h4>
                          </div>
                            <div class="card-header shadow" id="peso" role="button" data-toggle="collapse" href="#collapsehistoricos" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                              <h5 class="panel-title">
                                <a>
                                 Sitios Registrados
                                </a>
                              </h5>
                            </div>
                            <div id="collapsehistoricos" class="panel-collapse collapse" aria-labelledby="Sitios Historicos" data-parent="#accordionExample">
                              <div class= "card-body">
                                  @foreach ($categoria as $categorias)
                                        @foreach ( $categorias->places as $place )
                                          @if ($categorias->id == 4)
                                            @if( $place->category_id == 4 )
                                        
                                            @endif
                                          @endif
                                        @endforeach    
                                   @endforeach
                        </div>
                      </div>
                  </div>  
                </div>  
                      <div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
                            <div class="card" style="border-radius: 10px;">
                              <div class="card-header" id="heading" style="background-color: #DCDCDC;">
                                <h4 class="mb-0">
                                  Hoteles
                                </h4>
                              </div>
                                <div class="card-header shadow" id="hoteles" role="button" data-toggle="collapse" href="#collapsehoteles" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                                  <h5 class="panel-title">
                                    <a>
                                     Sitios Registrados
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapsehoteles" class="panel-collapse collapse" aria-labelledby="Hoteles Registrados" data-parent="#accordionExample">
                                    <div class= "card-body">
                                        @foreach ($categoria as $categorias)
                                        @foreach ( $categorias->places as $place )
                                          @if ($categorias->id == 5)
                                            @if( $place->category_id == 5 )
                                        
                                            @endif
                                          @endif
                                        @endforeach    
                                   @endforeach
                                    </div>
                                </div> 
                              </div>
                    </div>     
             {{-- <div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
               <div class="card" style="border-radius: 10px;">
                 <div class="card-header" id="heading" style="background-color: #DCDCDC;">
                   <h4 class="mb-0">
                     Glucometrías
                   </h4>
                 </div>
                   <div class="card-header shadow" id="glucometrias" role="button" data-toggle="collapse" href="#collapseglucometrias" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                     <h5 class="panel-title">
                       <a>
                         Registro de glucometrías
                       </a>
                     </h5>
                   </div>
                 
                   <div id="collapseglucometrias" class="panel-collapse collapse" aria-labelledby="glucometrias" data-parent="#accordionExample">
                     <div class= "card-body">
                       <table  style="text-align:center"  class="table table-striped table-bordered ">
                     <thead>
                         <tr>
                             <th>Fecha</th>
                             <th>Hora</th>
                             <th>Comida</th>
                             <th>Valor de glucosa</th>
             
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($glucometrias as $glucometria)
                         <tr>
                             <td> {{$glucometria->fecha}}</td>
                             <td> {{$glucometria->hora}}</td>
                             <td> {{$glucometria->tipo_hora}} {{$glucometria->tipo}}</td>
                             @if($glucometria->tipo_hora == "antes" && $glucometria->valor_glucometria >=100 && $glucometria->valor_glucometria <=120)
                                 <td style='background-color:RGB(72,201,176)' > {{$glucometria->valor_glucometria}}[Ideal]</td>
                             @elseif($glucometria->tipo_hora == "antes" && ($glucometria->valor_glucometria >=90 && $glucometria->valor_glucometria <=99) || ($glucometria->valor_glucometria >=121 && $glucometria->valor_glucometria <=130))
                                 <td style='background-color:RGB(255,128,0)' > {{$glucometria->valor_glucometria}}[inferior al normal]</td>
                             @elseif($glucometria->tipo_hora == "antes" && ( $glucometria->valor_glucometria <=89 || $glucometria->valor_glucometria >=131 ))
                                 <td style='background-color:RED' > {{$glucometria->valor_glucometria}}[Alto]</td>
                             @elseif($glucometria->tipo_hora == "despues" && $glucometria->valor_glucometria == 180)
                                 <td style='background-color:RGB(72,201,176)' > {{$glucometria->valor_glucometria}}[Ideal]</td>
                             @elseif($glucometria->tipo_hora == "despues" && ($glucometria->valor_glucometria >=170 && $glucometria->valor_glucometria <=179) || ($glucometria->valor_glucometria >=181 && $glucometria->valor_glucometria <=190))
                                 <td style='background-color:RGB(255,128,0)' > {{$glucometria->valor_glucometria}}[Superior al normal]</td>
                             @elseif($glucometria->tipo_hora == "despues" && ( $glucometria->valor_glucometria <=169 || $glucometria->valor_glucometria >=191 ))
                                 <td style='background-color:RED' > {{$glucometria->valor_glucometria}}[Alto]</td>
                             @endif
                         </tr>
                         @endforeach
                     </tbody>
                     
                 </table>
                     </div>
                   </div>
               </div>
             </div>
             
             <div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
               <div class="card" style="border-radius: 10px;">
                 <div class="card-header" id="heading" style="background-color: #DCDCDC;">
                   <h4 class="mb-0">
                     Insulinas
                   </h4>
                 </div>
                   <div class="card-header shadow" id="insulinas" role="button" data-toggle="collapse" href="#collapseinsulinas" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                     <h5 class="panel-title">
                       <a>
                         Registro de insulinas
                       </a>
                     </h5>
                   </div>
                 
                   <div id="collapseinsulinas" class="panel-collapse collapse" aria-labelledby="insulinas" data-parent="#accordionExample">
                     <div class= "card-body">
                       <table  style="text-align:center"  class="table table-striped table-bordered ">
                     <thead>
                         <tr>
                             <th>Id</th>
                             <th>Nombre</th>
                             <th>Fecha</th>
                             <th>Hora</th>
                             <th>Tipo</th>
                             <th>Inicio</th>
                             <th>Pico</th>
                             <th>Duración</th>
                             <th>Concentración</th>
             
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($insulinas as $insulina)
                         <tr>
                             <td> {{$insulina->id}}</td>
                             <td> {{$insulina->nombre}}</td>
                             <td> {{$insulina->fecha}}</td>
                             <td> {{$insulina->hora}}</td>
                             <td> {{$insulina->tipo}} </td>
                             <td> {{$insulina->inicio}} </td>
                             <td> {{$insulina->pico}} </td>
                             <td> {{$insulina->duracion}} </td>
                             <td> {{$insulina->concentracion}} </td>
             
                         </tr>
                         @endforeach
                     </tbody>
                     
                 </table>
                     </div>
                   </div>
               </div>
             </div>
             
             <div class="accordion" id="accordionExample" style="margin-bottom: 10px; padding: 10px;">
               <div class="card" style="border-radius: 10px;">
                 <div class="card-header" id="heading" style="background-color: #DCDCDC;">
                   <h4 class="mb-0">
                     Antescedentes
                   </h4>
                 </div>
                   
                 <div class="card-header shadow" id="personales" role="button" data-toggle="collapse" href="#collapsepersonales" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                     <h5 class="panel-title">
                       <a>
                         Personales
                       </a>
                     </h5>
                   </div>
                 
                   <div id="collapsepersonales" class="panel-collapse collapse" aria-labelledby="personales" data-parent="#accordionExample">
                     <div class= "card-body">
                         <table  style="text-align:center"  class="table table-striped table-bordered ">
                             <thead>
                                 <tr>
                                     <th>Id</th>
                                     <th>Nombre</th>
                                     <th>Fecha diagnostico</th>
                                     <th>Descripción</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($personales as $personal)
                                 <tr>
                                     <td> {{$personal->id}}</td>
                                     <td> {{$personal->nombre}}</td>
                                     <td> {{$personal->fecha_diagnostico}}</td>
                                     <td> {{$personal->descripcion}}</td>
             
                                 </tr>
                                 @endforeach
                             </tbody>
                     
                         </table>
                     </div>
                   </div>
             
                   <div class="card-header shadow" id="familiares" role="button" data-toggle="collapse" href="#collapsefamiliares" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                     <h5 class="panel-title">
                       <a>
                         Familiares
                       </a>
                     </h5>
                   </div>
                 
                   <div id="collapsefamiliares" class="panel-collapse collapse" aria-labelledby="familiares" data-parent="#accordionExample">
                     <div class= "card-body">
                         <table  style="text-align:center"  class="table table-striped table-bordered ">
                             <thead>
                                 <tr>
                                     <th>Id</th>
                                     <th>Nombre</th>
                                     <th>Fecha diagnostico</th>
                                     <th>Descripción</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($familiares as $familiar)
                                 <tr>
                                     <td> {{$familiar->id}}</td>
                                     <td> {{$familiar->nombre}}</td>
                                     <td> {{$familiar->fecha_diagnostico}}</td>
                                     <td> {{$familiar->descripcion}}</td>
             
                                 </tr>
                                 @endforeach
                             </tbody>
                     
                         </table>
                     </div>
                   </div>
             
                   <div class="card-header shadow" id="alergias" role="button" data-toggle="collapse" href="#collapsealergias" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                     <h5 class="panel-title">
                       <a>
                         Alergias
                       </a>
                     </h5>
                   </div>
                 
                   <div id="collapsealergias" class="panel-collapse collapse" aria-labelledby="alergias" data-parent="#accordionExample">
                     <div class= "card-body">
                         <table  style="text-align:center"  class="table table-striped table-bordered ">
                             <thead>
                                 <tr>
                                     <th>Id</th>
                                     <th>Nombre</th>
                                     <th>Fecha diagnostico</th>
                                     <th>Descripción</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($alergias as $alergia)
                                 <tr>
                                     <td> {{$alergia->id}}</td>
                                     <td> {{$alergia->nombre}}</td>
                                     <td> {{$alergia->fecha_diagnostico}}</td>
                                     <td> {{$alergia->descripcion}}</td>
             
                                 </tr>
                                 @endforeach
                             </tbody>
                     
                         </table>
                     </div>
                   </div>
             
                   <div class="card-header shadow" id="tratamientos" role="button" data-toggle="collapse" href="#collapsetratamientos" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                     <h5 class="panel-title">
                       <a>
                         Tratamientos
                       </a>
                     </h5>
                   </div>
                 
                   <div id="collapsetratamientos" class="panel-collapse collapse" aria-labelledby="tratamientos" data-parent="#accordionExample">
                     <div class= "card-body">
                         <table  style="text-align:center"  class="table table-striped table-bordered ">
                             <thead>
                                 <tr>
                                     <th>Id</th>
                                     <th>Nombre</th>
                                     <th>Fecha diagnostico</th>
                                     <th>Descripción</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($tratamientos as $tratamiento)
                                 <tr>
                                     <td> {{$tratamiento->id}}</td>
                                     <td> {{$tratamiento->nombre}}</td>
                                     <td> {{$tratamiento->fecha_diagnostico}}</td>
                                     <td> {{$tratamiento->descripcion}}</td>
             
                                 </tr>
                                 @endforeach
                             </tbody>
                     
                         </table>
                     </div>
                   </div>
             
                   <div class="card-header shadow" id="intervenciones" role="button" data-toggle="collapse" href="#collapseintervenciones" aria-expanded="true" aria-controls="collapseOne" class="trigger collapsed" style="text-decoration: none;">
                     <h5 class="panel-title">
                       <a>
                         Intervenciones quirúrgicas
                       </a>
                     </h5>
                   </div>
                 
                   <div id="collapseintervenciones" class="panel-collapse collapse" aria-labelledby="intervenciones" data-parent="#accordionExample">
                     <div class= "card-body">
                         <table  style="text-align:center"  class="table table-striped table-bordered ">
                             <thead>
                                 <tr>
                                     <th>Id</th>
                                     <th>Nombre</th>
                                     <th>Fecha diagnostico</th>
                                     <th>Descripción</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($intervenciones as $intervencione)
                                 <tr>
                                     <td> {{$intervencione->id}}</td>
                                     <td> {{$intervencione->nombre}}</td>
                                     <td> {{$intervencione->fecha_diagnostico}}</td>
                                     <td> {{$intervencione->descripcion}}</td>
             
                                 </tr>
                                 @endforeach
                             </tbody>
                     
                         </table>
                     </div>
                   </div> --}}
             
               </div>
             </div>
             
    {{-- <select  class="form-control">
        <option>----------</option>
        @foreach ($categoria as $categorias )
        <option value="{{ $categorias->id }}"> {{ $categorias->name }}</option>
        @endforeach        
    </select> --}}
    {{-- <input type="submit" value="Buscar Sitios" class="btn btn-info my-4"/>  --}}
    {{-- {{ $categoria}} --}}
    {{-- <table class="table">
        @foreach ($categoria as $categorias)

        <thead class="bg-primary text-light">
             <tr>
                    <th>{{ $categorias->name }}</th>    
             </tr>
        </thead>

        <tbody>
                @foreach ($categorias->places as $place )
            <tr>
                <td>
                    
                        {{ $place->name }}
                    
                </td>
            </tr>
            @endforeach
        </tbody>
        @endforeach
    </table>
     --}}
    {{-- <hr>
    <table class="table table-dark">
            <thead>
                <tr>
                    @foreach ($categoria as $categorias )
                        <th scope="col">{{ $categorias->name }}</th>
                    @endforeach
                </tr>      
            </thead>

            <tbody>
                @foreach($places as $lugar)
                    <tr>
                        <th scope="row">@if($lugar[0]->category_id == 1) {{ $lugar[0]->name }}</th>
                        <th scope="row">@elseif($lugar[0]->category_id == 2) {{ $lugar[0]->name }}</th>
                        <th scope="row">@elseif($lugar[0]->category_id == 3) {{ $lugar[0]->name }}</th>
                        <th scope="row">@elseif($lugar[0]->category_id == 4) {{ $lugar[0]->name }}</th>
                        <th scope="row">@elseif($lugar[0]->category_id == 5) {{ $lugar[0]->name }}</th>
                        @endif
                    </tr>
                @endforeach
              
            </tbody>

        </table>
 --}}

</div>
@endsection