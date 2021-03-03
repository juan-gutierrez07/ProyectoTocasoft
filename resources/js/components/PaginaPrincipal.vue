
<template>
    <div>
        <router-view></router-view>
    
    </div>
</template>

<script>
      
      import store from '../store';
      
      
    export default {
        store,
        mounted() {
            console.log('Component mounted.')
            axios.get('api/categorias').then(response =>{
                console.log(response)
            });
        }
    }
</script>
