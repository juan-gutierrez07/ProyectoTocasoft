
<template>
    <div class="container my-5">
    <h2> desde hoteles</h2>
    <div class="row">
        <div class ="col-md-4 mt-4" v-for=" hotel in this.hoteles" v-bind:key="hotel.id">
           <div class="card">
                    <img class="card-img-top" :src="`storage/${hotel.imagen_principal}`" v-bind:alt="hotel.name">
                    <div class="card-body">
                        <h3 class="card-title text-primary font-weight-bold"> {{ hotel.name }} </h3>
                        <p class="card-text"> {{hotel.direccion}}</p>
                        <p class="card-text">
                            <span class="font-weight-bold">Horario:</span>
                                {{hotel.apertura}} - {{hotel.cierre}}
                        </p>
                                <a class="btn btn-primary d-block">Ver Lugar</a>
                        

                    </div>
                </div>
        </div>
    </div>
    </div>
</template>
<script>
export default {

    mounted(){
        axios.get('/api/categorias/hoteles').then(response =>{
            this.$store.commit("Agregar_hoteles",response.data); // commit para enviar al metodo que va a realizar la acción la información
        });
    },
    computed:{  // poder pasar información del state general al componente que se esta utilizando actualmente mediante metodos
        hoteles(){
            return this.$store.state.hoteles;
        }
    }
}
</script>