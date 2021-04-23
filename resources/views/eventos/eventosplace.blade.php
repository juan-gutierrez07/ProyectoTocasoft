@extends('layouts.app')
@section('content')
<div class="container"> 
    @include('establecimientos.message')
    <legend class="text-primary" style="margin-top: 2%;position: relative; left: 40%;"> Eventos sitios turisticos</legend>
    <div class="row">
      <div class="col"></div>
      <div class="col-8"> <div id='calendar'></div></div>
      <div class="col"></div>
    </div>
</div>
<div class="modal fade" id="Agregar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar evento</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
              <!-- Modal Body -->
            <div class="modal-body">
              <p class="statusMsg"></p>
            <form id="FormEvent" method="post" enctype="multipart/form-data">
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="txtName"> Nombre:</label>
                      <input class="form-control" id="txtName" name="name" type="text" placeholder="Nombre del evento">
                    </div>
                  <div class="form-group col-md-6">
                      <label for="txtFecha">Fecha de inicio</label>
                    <input class="form-control" id="txtFecha" name="start" type="text" disabled>
                  </div>
                  {{-- <div class="form-group col-md-6">
                      <label for="txtFechaFinal">Fecha Final</label>
                      <input class="form-control"type="date" id="txtFechaFinal" name="finish" max="2030-01-01">
                  </div> --}}
              </div>
              <div class="form-group">
                  <label for="inputDescription">Descripción</label>
                  <textarea class="form-control" id="txtDescripcion" name="description"  cols="20" rows="10" placeholder="Descripción del evento.."></textarea>
              </div>
              <div class="form-group">
                <label for="imagen_principal">Imagen </label>
                <input id="txtImagen"
                type="file"class="form-control" name="imagen_location">     
            </div>            
              <div class="form-group">
                  <label for="txtPlace">Sitio </label>
                  <select  name ="place_id" id="txtPlace" class="form-control" required>
                      <option value="">----------</option>
                      @foreach($places as $place)
                      <option value="{{ $place->id }}"> {{ $place->name }}</option>
                      @endforeach
              </select>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="txtName"> Hora inicio:</label>
                    <input class="form-control" min="04:00" max="24:00"  step="600" id="txtHora" name="horainicio" type="time">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="txtFecha">Hora final</label>
                    <input class="form-control" id="txtFinal" min="04:00" max="24:00"  step="600" name="horafin" type="time">
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPuntos">Color:</label>
                  <input  class="form-control" type="color" id="txtColor" name="color">
              </div>
              <!-- Modal Footer -->
              <div class="modal-footer">
                <input type="submit" id="btnAgregar" class="btn btn-success" value="Agregar">
                <a id="btnEliminar" class="btn btn-danger">Eliminar</a>        
                <a class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
              </div>
            </form>  
            </div>
        </div>
    </div>
</div>

@endsection
<style>
#calendar{
  margin: 40px auto;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
}
</style>
<script> 
  document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar:{
          left:'prev,next today Agregar',
          center:'title',
          right:'dayGridMonth,timeGridWeek,timeGridDay'
        },
        customButtons:{
          // Agregar:{
          //   text:"Agregar evento",
          //   click:function(){
              
          //   }
          // }
        },
        dateClick: function(info)
        {
        limpiar();
        $("#txtFinal").attr('min',info.dateStr);
        $("#txtFecha").val(info.dateStr);
        $("#Agregar").modal();
        
        // calendar.addEvent({title:"Prueba", date:info.dateStr})
        },
        eventClick:function(info)
        {
          
          console.log(info);
          console.log(info.event._def.title);
          console.log(info.event._instance.range.start);
          console.log(info.event.extendedProps.descripcion);
          mes = (info.event._instance.range.start.getMonth()+1);
          dia =(info.event._instance.range.start.getDate());
          año = (info.event._instance.range.start.getFullYear());
          mes = (mes<10)?"0"+mes:mes;
          dia = (dia<10)?"0"+dia:dia;
          horainicial = (info.event._instance.range.start.getHours());
          minutoinicial =(info.event._instance.range.start.getMinutes());
          horainicial=(horainicial <10)?"0"+horainicial:horainicial;
          minutoinicial=(minutoinicial <10)?"0"+minutoinicial:minutoinicial;
          horafinal = (info.event._instance.range.end.getHours());
          minutofinal = (info.event._instance.range.end.getMinutes());
          horafinal=(horafinal <10)?"0"+horafinal:horafinal;
          minutofinal=( minutofinal <10)?"0"+ minutofinal: minutofinal;
          horainicio = (horainicial+":"+minutoinicial);
          horafinal = (horafinal+":"+minutofinal);
          // console.log(info.event._def.ui.backgroundColor);
          id =(info.event._def.publicId);
          $("#txtName").val(info.event._def.title);
          $("#txtDescripcion").val(info.event.extendedProps.descripcion);
          $("#txtFecha").val(año+"-"+mes+"-"+dia);
          $("#txtHora").val(horainicio);
          $("#txtFinal").val(horafinal);
          $("#txtColor").val(info.event._def.ui.backgroundColor);
          // $("#txtImagen").val(info.event.extendedProps.imagen_location)
          // $("#txtFechaFinal").val(info.event._instance.range.end);
          $("#txtPlace").val(info.event.extendedProps.place_id);
          $("#Agregar").modal();
          // console.log(info);
        },
        // events:[
        //   {
        //     title:'prueba',
        //     start:'2021-04-16 12:30:00',
        //     color:'#ffccaa',
        //     textColor:'#ffffff',
        //     descripcion:'Es una pruebaaaaaaaaaaaa'
            
        //   }
        // ]
        events:"{{ url('/eventos/show') }}"
        
      });
      calendar.render();

      $('#FormEvent').on('submit', function(e) {
        e.preventDefault();
        var date = document.getElementById("txtFecha").value;
        var time = document.getElementById("txtHora").value;
        var time2 = document.getElementById("txtFinal").value;
        horainicial = new Date(date+ " " +time);
        horafinal = new Date(date +" "+ time2);
        hora1 = horainicial.getHours();
        minutos1 = horainicial.getMinutes();
        segundos1 = horainicial.getSeconds();
        hora1 = (hora1<10)?"0"+hora1:hora1;
        minutos1 = (minutos1<10)?"0"+minutos1:minutos1;
        segundos1 = (segundos1<10)?"0"+segundos1:segundos1;
        /* fechaa final*/
        hora2 = horafinal.getHours();
        minutos2 = horafinal.getMinutes();
        segundos2 = horafinal.getSeconds();
        hora2 = (hora2<10)?"0"+hora2:hora2;
        minutos2 = (minutos2<10)?"0"+minutos2:minutos2;
        segundos2 = (segundos2<10)?"0"+segundos2:segundos2;

        horatart =(hora1+":"+minutos1+":"+segundos1);
        horaend =(hora2+":"+minutos2+":"+segundos2);
        fechainicial = (date+" "+horatart)
        fechafinal = (date+" "+horaend);
        console.log(fechainicial);
        console.log(fechafinal);
      var formData = new FormData(this);
        formData.append('_token',$('input[name=_token]').val());
        var file = document.getElementById("txtImagen").files[0];
        formData.append('imagen_location',file);
        formData.append('start',fechainicial);
        formData.append('end',fechafinal);

        $.ajax({
              type: 'POST',
              url: '{{ url('/eventos')}}',
              data: formData,
              contentType: false,
              cache: false,
              processData:false,
              success:function(data)
              {
                $("#Agregar").modal('toggle');
                calendar.refetchEvents();
                alert("Evento:" + data.name+" Agregado !");
                console.log(data);

              }, error:function(response){
                $.each(response.responseJSON.errors, function(key,value) {
                  alert(value);
                 
                });
                  
              }
            });  
      });            
       
      // $("#btnAgregar").click(function(){

      //   // objEvent=recolectarInfo("POST");
      //   // enviarInfo('',objEvent);
      // });
      $("#btnEliminar").click(function(){
        objEvent=recolectarInfo("DELETE");
        enviarInfo('/'+id,objEvent);
      });
      function recolectarInfo(method)
      {
        nuevoEvento=
        { 
          title:$("#txtName").val(),
          descripcion:$("#txtDescripcion").val(),
          color:$("#txtColor").val(),
          // imagen_location:$("#txtImagen").val(),
          start:$("#txtFecha").val()+ " "+ $("#txtHora").val(),
          end:$("#txtFecha").val()+ " "+ $("#txtFinal").val(),
          place_id:$("#txtPlace").val(),
          '_token':$("meta[name=csrf-token]").attr('content'),
          '_method': method
        }
        return (nuevoEvento);
      }
      function enviarInfo(accion,objEvent)
      {
        $.ajax({
          type:"POST",
          url:"{{url('/eventos')}}"+accion,
          data:objEvent,
          success:function(response)
          {
            console.log(response);

            $("#Agregar").modal('toggle');
            calendar.refetchEvents();
          },
          error:function()
          {
            alert('Error');
          }

        });
      }
      function limpiar()
      {
          console.log("Funciono");
          $("#txtName").val('');
          $("#txtDescripcion").val('');
          $("#txtFecha").val('');
          $("#txtHora").val('');
          $("#txtFinal").val('');
          $("#txtPlace").val('');
          $("#txtColor").val('');
          $("#txtImagen").val('');
 
      }
    
    });
  </script>