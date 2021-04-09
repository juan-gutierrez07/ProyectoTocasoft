<template>
       
    <input type="submit" class ="btn btn-danger" style="margin-right:13px;" v-on:click="EliminarComentario" value="Eliminar"/>
       
</template>
<script>
export default {
    props:['comentarioId'],
    mounted(){
        
    },
    methods:{
        EliminarComentario()
        {
        this.$swal({
                    title: 'Estas Seguro?',
                    text: "Eliminaras tu comentario !!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'no'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        axios.get('/coment/destroy/'+this.comentarioId).then( response =>{
                                console.log(response.data);
                                document.getElementById('comentarios').innerHTML = response.data.total;
                                document.getElementById('promedio').innerHTML = response.data.promedio;
                                
                        });
                            
                        // console.log(this.$el.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode);
                                
                        this.$el.parentNode.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode.parentNode);

                        // this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        this.$swal({
                        title: 'Acción Completa !',
                        text:'El comentario se eliminó .',
                        icon:'success'
                        })
                    }
                    })
        }
    }
}
</script>