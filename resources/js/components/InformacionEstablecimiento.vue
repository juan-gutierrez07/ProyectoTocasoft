<template>
    <div class ="container my-5">
       <h2 class="text-center mb-5"> {{establecimiento.name}} </h2>

        <div class="row align-items-start">
            <div class="col-md-8 order-2">
                    <img :src="`../storage/${establecimiento.imagen_principal}`" class="img-fluid" alt="imagen establecimiento">
                    <p class="mt-3"> {{establecimiento.descripcion}} </p>
                      <galeria-imagenes></galeria-imagenes>
            </div>
                <aside class="col-md-4 order-1">
                <div>
                    <mapa-ubicacion></mapa-ubicacion>
                </div>
                    <div class="p-4 bg-primary ">
                    <h2 class="text-center text-white mt-2 mb-4">Más Información</h2>

                    <p class="text-white mt-1">
                        <span class="font-weight-bold">
                            Ubicación:
                        </span>
                        {{ establecimiento.direccion }}
                    </p>

                    <p class="text-white mt-1">
                        <span class="font-weight-bold">
                            Horario:
                        </span>
                        {{ establecimiento.apertura }} – {{ establecimiento.cierre }}
                    </p>

                    <p class="text-white mt-1">
                        <span class="font-weight-bold">
                            Teléfono:
                        </span>
                        {{ establecimiento.telefono }} - {{ establecimiento.id }}
                    </p>
                </div>
               
                
                
            </aside>
        </div>
    </div>
</template>
    
<script>
import MapaUbicacion from './MapaUbicacion';
import GaleriaImagenes from './GaleriaImagenes';

export default {
components:{
        MapaUbicacion,
        GaleriaImagenes,
    },
    mounted(){
            const {id} = this.$route.params;
            axios.get('/api/establecimiento/'+id).then(response =>{
                this.$store.commit('Agregar_establecimiento',response.data);
                
            });
            

    },
    computed:{
        establecimiento(){
            return this.$store.state.establecimiento;
        }
    }
}
</script>