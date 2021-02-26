
<template>
    <div class="container">
        <categoria-hoteles></categoria-hoteles>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                            
                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
      import CategoriaHoteles from './CategoriaHoteles';
      import store from '../store';
    export default {
        store,
        components:{
            CategoriaHoteles
        },
        mounted() {
            console.log('Component mounted.')
            axios.get('api/categorias').then(response =>{
                console.log(response)
            });
        }
    }
</script>
