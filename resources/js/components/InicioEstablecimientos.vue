<template>
        <div>
          <mapa-establecimientos></mapa-establecimientos>
         <categoria-hoteles></categoria-hoteles>
        </div>
</template>

<script>
      import CategoriaHoteles from './CategoriaHoteles';
      import carousel  from 'vue-owl-carousel';
      import MapaEstablecimientos from './MapaEstablecimientos'
      
      
      
    export default {
        components:{
            CategoriaHoteles,
            carousel,
            MapaEstablecimientos,
            
        },
        mounted() {
            console.log('Component mounted.')
   

        }
    }
</script>
