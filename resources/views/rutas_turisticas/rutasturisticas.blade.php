@extends('layouts.app')
@section('styles')
<link
rel="stylesheet"
href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css"
/>
@endsection
@section('content')
<div class="container">
<div id="map"></div>
</div>
@endsection
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script>
function initMap() {
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer();
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: { lat:4.45637843,lng:-74.63432193 },
  });
  directionsRenderer.setMap(map);
}
</script>
  <script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYy4gM0DMppka3Qqgls7VHCzyEyGEEzvg&callback=initMap"
  async
></script>
<style>
html, body {
height: 100%;
margin: 0;
padding: 0;
}
#map {
height: 100%;
float: left;
width: 70%;
}
</style>
