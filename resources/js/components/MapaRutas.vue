<template>
    <div class ="mapa" style="left:5%;z-index:1;border-radius: 5px 5px 5px 5px;">
      <l-map :zoom="zoom" :center="center" :option="mapOptions">
        <l-tile-layer :url="url" :attribution="attribution"/>

      </l-map>
    </div>  
</template>
<script>
import {latLng} from 'leaflet';
import { LMap, LTileLayer, LMarker, LTooltip, LIcon, LPolyline } from "vue2-leaflet";
export default {
   components: {
    LMap,
    LTileLayer,
    LMarker,
    LTooltip,
    LIcon,
    LPolyline,
  },
  props:['rutaId'],
  data() {
      sitiosrutas:[]
    return {
      zoom: 13,
      center: latLng(4.45637843,-74.63432193),
      url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      attribution:'&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      currentZoom: 11.5,
      currentCenter: latLng(4.45637843,-74.63432193),
      showParagraph: false,
      mapOptions: {
        zoomSnap: 0.5
      },
      showMap: true
    };
  },
  mounted(){
     
      axios.get('/rutas/coordenas/'+this.rutaId).then(response =>{
              this.sitiosrutas = response;
      });
  }
}
</script>
<style scoped>
@import "https://unpkg.com/leaflet@1.6.0/dist/leaflet.css";

.mapa {
  height: 500px;
  width: 100%;
}
</style>