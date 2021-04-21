import {
    OpenStreetMapProvider
} from 'leaflet-geosearch';
const provider = new OpenStreetMapProvider();

document.addEventListener('DOMContentLoaded', () => {

    if (document.querySelector('#mapasitio')) {
        const lat = document.querySelector('#lat').value === '' ? 4.45637843 : document.querySelector('#lat').value;
        const lng = document.querySelector('#lng').value === '' ? -74.63432193 : document.querySelector('#lng').value;


        var map = L.map('mapasitio').setView([4.45637843, -74.63432193], 16);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        //crear capa para pines previos
        // let markers = new L.FeatureGroup().addTo(map);
        let marker;
        /// Crear pin o marcador dandole una posicion en el mapa para que se ubique
        marker = new L.marker([lat, lng], {
            draggable: true

        }).addTo(map);
        //añadiendo marcador a la capa de marcadores        
        // markers.addLayer(marker);    
        obtenerLatLong(marker);

        function obtenerLatLong(marker) {
            marker.on('moveend', function (e) {
                marker = e.target;
                const posicion = marker.getLatLng();
                console.log("Ha movido a " + posicion.lat + " " + posicion.lng);
                map.panTo(new L.LatLng(posicion.lat, posicion.lng))
                marker.bindPopup("Ha movido a " + posicion.lat + " " + posicion.lng);
                marker.openPopup();
                document.querySelector("#lat").value = posicion.lat || "";
                document.querySelector("#lng").value = posicion.lng || "";
            });
        }
    }
    // if(document.querySelector('#maparutas')){
    //   const lat = 4.45637843;
    //   const lng = -74.63432193;


    //     var map = L.map('maparutas').setView([4.45637843,-74.63432193], 16);
    // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    // }).addTo(map);
    // crear capa para pines previos
    // let markers = new L.FeatureGroup().addTo(map);
    // let marker;
    // / Crear pin o marcador dandole una posicion en el mapa para que se ubique
    // marker = new L.marker([lat,lng],{
    //     draggable: true

    //     }).addTo(map);
    // }  
    

});



//Otras cosas que no fueron utiles

// const buscador = document.querySelector("#formbuscar");
// buscador.addEventListener('blur',function(e){
//   if(e.target.value.length >5)
//   {
//     provider.search({ query: e.target.value})
//    .then(resultado =>{
//       Limpiar pines viejos
//      console.log(resultado[0].bounds[0])

//      if(resultado != null)
//       {
//         Asigna el valor del sitio encontrado al input con el id escrito
//         document.querySelector("#direccion").value= resultado[0].label;

//         limpiar marcadores viejos
//         markers.clearLayers();
//         Centrar el mapa hacia el resultado
//         map.setView(resultado[0].bounds[0]);
//         Crear  el  nuevo marcador en el mapa
//         marker = new L.marker(resultado[0].bounds[0],{
//           draggable: true

//           }).addTo(map);

//            Reubicar(marker);  
//           Agregar el marcador  
//           markers.addLayer(marker);
//       }else{
//         alert("No se pudo encontrar el sitio por el nombre, por favor ingrese sus coordenadas");
//         document.querySelector("#lat").type="text";
//         document.querySelector("#lng").type="text";
//         marker = new L.marker([4.45637843,-74.63432193],{
//           draggable: true

//           }).addTo(map);
//       }

//    }) .catch(error => {
//     console.log(error)
// })

//   }
// });
