<template>
  <div>
        <ul class="flex flex-wrap justify-center">
            <li class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
                v-for="( sitios, i )  in this.sitios"
                v-bind:key="i"
            >{{sitios}}</li>
            
        </ul>

        <input type="hidden" name="skills" id="skills" >
    </div>
</template>
<script>
export default {
    props:['sitios'],

}
</script>