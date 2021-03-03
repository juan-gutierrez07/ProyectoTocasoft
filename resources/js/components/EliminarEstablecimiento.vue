<template>
       
                      <input type="submit" class ="btn btn-danger d-block w-100 mb-2" v-on:click="EliminarEstablecimiento" value="Eliminar"/>
       
</template>
<script>
export default {
    props:['establecimientoId'],
    mounted(){
        
    },
    methods:{
        EliminarEstablecimiento()
        {
        this.$swal({
                    title: 'Estas Seguro?',
                    text: "Eliminaras la información del sistema",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'no'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        axios.get('/establecimiento/destroy/'+this.establecimientoId).then( response =>{
                                console.log(response)
                        });
                        this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        this.$swal({
                        title: 'Acción Completa !',
                        text:'El registro ha sido eliminado .',
                        icon:'success'
                        })
                    }
                    })
        }
    }
}
</script>