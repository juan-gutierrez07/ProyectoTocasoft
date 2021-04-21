@extends('layouts.app')
<style type="text/css">
        #right-panel {
          font-family: "Roboto", "sans-serif";
          line-height: 30px;
          padding-left: 10px;
        }
  
        #right-panel select,
        #right-panel input {
          font-size: 15px;
        }
  
        #right-panel select {
          width: 100%;
        }
  
        #right-panel i {
          font-size: 12px;
        }
  
        html,
        body {
          height: 100%;
          margin: 0;
          padding: 0;
        }
  
        #map {
          height: 100%;
          float: left;
          width: 70%;
          height: 100%;
        }
  
        #right-panel {
          margin: 20px;
          border-width: 2px;
          width: 20%;
          height: 400px;
          float: left;
          text-align: left;
          padding-top: 0;
        }
  
        #directions-panel {
          margin-top: 10px;
          background-color: #ffee77;
          padding: 10px;
          overflow: scroll;
          height: 174px;
        }
      </style>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?AIzaSyAJS3OjbULIHOSvrfcUrfd37mkeyHF_PGk&sensor=false"></script>
<script>
function initMap() {
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 6,
        center: { lat: 41.85, lng: -87.65 },
        });
        directionsRenderer.setMap(map);
        document.getElementById("submit").addEventListener("click", () => {
        calculateAndDisplayRoute(directionsService, directionsRenderer);
        });
        }

        function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        const waypts = [];
        const checkboxArray = document.getElementById("waypoints");

        for (let i = 0; i < checkboxArray.length; i++) {
        if (checkboxArray.options[i].selected) {
        waypts.push({
        location: checkboxArray[i].value,
        stopover: true,
        });
        }
        }
        directionsService.route(
        {
        origin: document.getElementById("start").value,
        destination: document.getElementById("end").value,
        waypoints: waypts,
        optimizeWaypoints: true,
        travelMode: google.maps.TravelMode.DRIVING,
        },
        (response, status) => {
        if (status === "OK" && response) {
        directionsRenderer.setDirections(response);
        const route = response.routes[0];
        const summaryPanel = document.getElementById("directions-panel");
        summaryPanel.innerHTML = "";

        // For each route, display summary information.
        for (let i = 0; i < route.legs.length; i++) {
        const routeSegment = i + 1;
        summaryPanel.innerHTML +=
                "<b>Route Segment: " + routeSegment + "</b><br>";
        summaryPanel.innerHTML += route.legs[i].start_address + " to ";
        summaryPanel.innerHTML += route.legs[i].end_address + "<br>";
        summaryPanel.innerHTML +=
                route.legs[i].distance.text + "<br><br>";
        }
        } else {
        window.alert("Directions request failed due to " + status);
        }
        }
        );
      }
// function initialize() {
// // Configuración del mapa
// var mapProp = {
// zoom: 3,
// center: {lat: -34.6036844, lng: -58.381559100000004},
// mapTypeId: google.maps.MapTypeId.TERRAIN
// };
// // Agregando el mapa al tag de id googleMap
// var map = new google.maps.Map(document.getElementById("map"), mapProp);

// // Coordenada de la ruta (desde Misiones hasta Tierra del Fuego)
// var flightPlanCoordinates = [
// {lat: 4.3136195, lng: -74.7998502},
// {lat: 4.457685764753479, lng: -74.64071750311005},
// {lat: 4.45354981875302, lng:-74.64655439706951},
// // {lat: -54.8053998, lng: -68.32420609999997}
// ];

// // Información de la ruta (coordenadas, color de línea, etc...)
// var flightPath = new google.maps.Polyline({
// path: flightPlanCoordinates,
// geodesic: true,
// strokeColor: '#FF0000',
// strokeOpacity: 1.0,
// strokeWeight: 2
// });

// // Creando la ruta en el mapa
// flightPath.setMap(map);
// }

// Inicializando el mapa cuando se carga la página
google.maps.event.addDomListener(window, 'load', initMap);

</script>
@section('styles')
@endsection
@section('content')
<div class="container">
                <div id="map"></div>
                <div id="right-panel">
                  <div>
                    <b>Start:</b>
                    <select id="start">
                      <option value="Halifax, NS">Halifax, NS</option>
                      <option value="Boston, MA">Boston, MA</option>
                      <option value="New York, NY">New York, NY</option>
                      <option value="Miami, FL">Miami, FL</option>
                    </select>
                    <br />
                    <b>Waypoints:</b> <br />
                    <i>(Ctrl+Click or Cmd+Click for multiple selection)</i> <br />
                    <select multiple id="waypoints">
                      <option value="montreal, quebec">Montreal, QBC</option>
                      <option value="toronto, ont">Toronto, ONT</option>
                      <option value="chicago, il">Chicago</option>
                      <option value="winnipeg, mb">Winnipeg</option>
                      <option value="fargo, nd">Fargo</option>
                      <option value="calgary, ab">Calgary</option>
                      <option value="spokane, wa">Spokane</option>
                    </select>
                    <br />
                    <b>End:</b>
                    <select id="end">
                      <option value="Vancouver, BC">Vancouver, BC</option>
                      <option value="Seattle, WA">Seattle, WA</option>
                      <option value="San Francisco, CA">San Francisco, CA</option>
                      <option value="Los Angeles, CA">Los Angeles, CA</option>
                    </select>
                    <br />
                    <input type="submit" id="submit" />
                  </div>
                  <div id="directions-panel"></div>
                </div>
@endsection

<style>
#map{
        height: 600px;
}
</style>