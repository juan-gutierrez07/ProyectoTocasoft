<template>
       
         <categoria-hoteles></categoria-hoteles>
       
</template>

<script>
      import CategoriaHoteles from './CategoriaHoteles';
      import carousel  from 'vue-owl-carousel';
      
      
      
    export default {
        components:{
            CategoriaHoteles,
            carousel,
            
        },
        mounted() {
            console.log('Component mounted.')
   

        }
    }
</script>
