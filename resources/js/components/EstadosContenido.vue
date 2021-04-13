<template>
   <button id="estado" class="btn btn-success mb-2" style="margin-right: 10px;" v-on:click="CambiarEstado()">Activo</button>
</template>
<script>
export default {
    props:['estadoIndex'],
    mounted(){
           
           
    },
    methods:{
            CambiarEstado()
            {   
                // if( document.getElementsByTagName("button").className == "btn btn-success mb-2")
                // {
                //     // $('#estado').removeClass('btn btn-success mb-2');
                //     // $('#estado').addClass('btn btn-danger mb-2');
                //     document.getElementById('estado').innerHTML = "Inactivo";
                // }else{  
                //     //  $('#estado').removeClass('btn btn-danger mb-2');    
                //     //  $('#estado').addClass('btn btn-success mb-2');
                //      document.getElementById('estado').innerHTML = "Activo";
                // }
                

            }
    }
}
</script>