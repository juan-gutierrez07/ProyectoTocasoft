<template>
     <a class ="btn btn-danger d-block" v-on:click="EliminarImagen"> Eliminar</a>
</template>
<script>
export default {
     props:['imagenId'],
    mounted(){
        
    },
    methods:{
        EliminarImagen()
        {
        this.$swal({
                    title: 'Estas Seguro?',
                    text: "Eliminaras la imagen del sistema y ruta",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'no'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        axios.get('/imagenesrt/destroy/'+this.imagenId).then( response =>{
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
<style lang="stylus" scoped>

</style>