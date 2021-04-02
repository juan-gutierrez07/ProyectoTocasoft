<template>
        <div>
          <mapa-establecimientos></mapa-establecimientos>
        </div>
</template>

<script>
      import MapaEstablecimientos from './MapaEstablecimientos'
      
      
      
    export default {
        components:{
            MapaEstablecimientos,
            
        },
        mounted() {
            console.log('Component mounted.')
   

        }
    }
</script>
