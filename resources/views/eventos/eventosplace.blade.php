@extends('layouts.app')
@section('content')
<div class="container"> 
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
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="txtName"> Nombre:</label>
                      <input class="form-control" id="txtName" name="name" type="text" placeholder="Nombre del evento">
                    </div>
                  <div class="form-group col-md-6">
                      <label for="txtFecha">Fecha de inicio</label>
                    <input class="form-control" id="txtFecha" name="start" type="" disabled>
                  </div>
                  {{-- <div class="form-group col-md-6">
                      <label for="txtFechaFinal">Fecha Final</label>
                      <input class="form-control"type="date" id="txtFechaFinal" name="finish" max="2030-01-01">
                  </div> --}}
              </div>
              <div class="form-group">
                  <label for="inputDescription">Descripción</label>
                  <textarea class="form-control" id="txtDescripcion" name="description" placeholder="Descripción del evento.."></textarea>
              </div>
              <div class="form-group">
                  <label for="txtPlace">Sitio </label>
                  <select  name ="place_id" id="txtPlace" class="form-control">
                      <option value="">----------</option>
                      @foreach($places as $place)
                      <option value="{{ $place->id }}"> {{ $place->name }}</option>
                      @endforeach
              </select>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="txtName"> Hora inicio:</label>
                    <input class="form-control" id="txtHora" name="name" type="time" placeholder="Nombre del evento">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="txtFecha">Hora final</label>
                    <input class="form-control" id="txtFinal" name="start" type="time" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPuntos">Color:</label>
                  <input  class="form-control" type="color" id="txtColor" name="color">
              </div>
              <!-- Modal Footer -->
              <div class="modal-footer">
                <button id="btnAgregar" class="btn btn-success">Agregar</button>    
                <button id="btnEditar" class="btn btn-primary">Editar</button>
                <button id="btnEliminar" class="btn btn-danger">Eliminar</button>        
                <a class="btn btn-secondary" data-dismiss="modal">Cerrar</a>
              </div>
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
          Agregar:{
            text:"Agregar evento",
            click:function(){
              alert('funciona');
            }
          }
        },
        dateClick: function(info)
        {
        $("#txtFinal").attr('min',info.dateStr);
        $("#txtFecha").val(info.dateStr);
        $("#Agregar").modal();
        // console.log(info);
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
          horainicio = (info.event._instance.range.start.getHours()+":"+info.event._instance.range.start.getMinutes());
          horafinal = (info.event._instance.range.end.getHours()+":"+info.event._instance.range.end.getMinutes());
          console.log(horainicio + "-----"+ horafinal+"-----------"+info.event._instance.range.end.getTime());
          $("#txtName").val(info.event._def.title);
          $("#txtDescripcion").val(info.event.extendedProps.descripcion);

          $("#txtFecha").val(dia+"/"+mes+"/"+año);
          $("txtHora").val(horainicio);
          $("txtFinal").val(horafinal);
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
       events:"/eventosall"
        
      });
      calendar.render();
      $("#btnAgregar").click(function(){
        
        objEvent=recolectarInfo("POST");
        enviarInfo('',objEvent);
      });
      function recolectarInfo(method)
      {
        nuevoEvento=
        {
          name:$("#txtName").val(),
          descripcion:$("#txtDescripcion").val(),
          color:$("#txtColor").val(),
          start:$("#txtFecha").val()+ " "+ $("#txtHora").val(),
          finish:$("#txtFecha").val()+ " "+ $("#txtFinal").val(),
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
          url:"/eventos/store",
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
    });
  </script>