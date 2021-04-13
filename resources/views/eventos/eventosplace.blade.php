@extends('layouts.app')
@section('content')
<div> 
    <legend class="text-primary"> Eventos sitios turisticos</legend>
</div>
<div id='calendar'></div>
@endsection
@section('scripts')
<script type="application/javascript"> 
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth'
    });
    calendar.render();
  });
</script>
@endsection