<template>
    <div class ="mapa" style="left:10%;top:150px; position:absolute;border-radius: 10px 10px 10px 10px;">
      <l-map :zoom="zoom" :center="center" :option="mapOptions">
        <l-tile-layer :url="url" :attribution="attribution"/>
            <l-marker v-for =" establecimiento in establecimientos" v-bind:key="establecimiento.id"
                    :lat-lng="obtenerCoordenadas(establecimiento)" :icon="iconoEstablecimiento(establecimiento)">
            >
                <l-tooltip>
                        <div>{{establecimiento.name}}</div>
                </l-tooltip>
          </l-marker>
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
  data() {
    return {
      zoom: 15,
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
      axios.get('/api/establecimientos').then(response =>{
          this.$store.commit('Agregar_establecimientos',response.data);
            // console.log(response.data[0].lat+ "-" + response.data[0].lng)
            // console.log(response.data[1].lat+ "-" + response.data[1].lng)
            response.data.forEach(function(datos,index){
              console.log(datos.lat+"-"+""+datos.lng);
            
            });
            
                  
            
      });
   
  },
  computed: {
        establecimientos(){
            return this.$store.getters.obtenerEstablecimientos;
        }
  },
  methods:{
      obtenerCoordenadas(establecimiento){
        return {
        lat: establecimiento.lat,
        lng: establecimiento.lng
      };
      },
      // dibujarLinea(establecimiento){
      //     const coorde = [
      //         establecimiento.lat,
      //         establecimiento.lng
      //     ]
      //     return coorde
      // },
      iconoEstablecimiento(establecimiento) {
      const { slug } = establecimiento.category;
      return L.icon({
        iconUrl: `images/iconos/${slug}.png`,
        iconSize: [40, 50]
      });
    },
  }
}
</script>
<style scoped>
.mapa {
  height: 80%;
  width: 80%

}
</style>
