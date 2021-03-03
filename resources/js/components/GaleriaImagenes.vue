<template>
    <div>
        <h2 class="mt-4">Galería de Imágenes</h2>

        <ul class="row list-unstyled mt-4">
            <li class="col-md-4 mb-4" v-for="imagen in imagenes" v-bind:key="imagen.id">
                <!-- <a :href='`/storage/${imagen.location}`' data-lightbox="imagenes" data-title="Imagen Establecimiento"> -->
                    <img class="img-fluid" :src='`/storage/${imagen.location}`'>
                <!-- </a> -->
            </li>
        </ul>
    </div>
</template>

<script>


export default {
    computed: {
        imagenes() {
            return this.$store.getters.obtenerImagenes
        }
    }
}
</script>


