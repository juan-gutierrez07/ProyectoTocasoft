<template>
  <div class="mapa">
    <l-map :zoom="zoom" :center="center" :options="mapOptions">
      <l-tile-layer :url="url" :attribution="attribution" />
      <l-marker :latLng="center">
        <l-tooltip>
          <div>{{establecimiento.name}}</div>
        </l-tooltip>
      </l-marker>
    </l-map>
  </div>
</template>


<script>
import { latLng } from "leaflet";
import { LMap, LTileLayer, LMarker, LTooltip } from "vue2-leaflet";
export default {
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LTooltip
  },
  data() {
    return {
      zoom: 16,
      center: latLng(4.45637843,-74.63432193),
      url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      attribution:'&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      currentZoom: 11.5,
      mapOptions: {
        zoomSnap: 0.5
      },
      lat: "",
      lng: ""
    };
  },
 created(){
   setTimeout(() => {
      this.lat = this.$store.getters.ObtenerEstablecimiento.lat;
      this.lng = this.$store.getters.ObtenerEstablecimiento.lng;
      this.center = latLng(this.lat, this.lng);
    }, 1000);
 },
 computed:{
         establecimiento(){
            return this.$store.state.establecimiento;
        }
 }
};
</script>


<style scoped>
@import "https://unpkg.com/leaflet@1.6.0/dist/leaflet.css";

.mapa {
  height: 300px;
  width: 100%;
}
</style>
