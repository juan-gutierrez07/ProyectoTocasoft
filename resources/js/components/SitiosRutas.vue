<template>
<div>
  <div class="wrap" v-for="( sitio, i )  in this.sitios" v-bind:key="i">
        <div class="checkbox">
           <h2>{{sitio}}</h2>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props:['sitios'],

}
</script>
<style scoped>
 /* ul li {
      list-style:none
 }
 .wrap input[type="checkbox"]{
     display:none;
 }
 .wrap .checkbox label{
     color: black;
     padding: 5px 15px 5px 51px;
     display: inline-block;
     position: relative;
     font-size: 1em;
     border-radius: 6px;
     cursor:pointer;
     -webkit-transition: all 0.4s ease;
     -o-transition:  all 0.4s ease;
     transition:  all 0.4s ease;
     
 }
 .wrap .checkbox label:hover{
     background:rgba(0,116,217,1);
 }
 .wrap .checkbox label::before{
        content: "";
        width: 20px;
        height: 20px;
        display: inline-block;
        background: none;
        border: 3px solid #0074D9;
        border-radius: 50%;
        position:absolute;
        left: 17px;
        top:4px;
 }
 .wrap .checkbox label::before{
     border-radius: 5px;
 }
.wrap input[type="checkbox"]:checked + label{
    padding:5px 15px;
    background: #0074D9;
    border-radius: 2px;
    color:#fff;
}
.wrap input[type="checkbox"]:checked + label::before{
    display: none;
} */
</style>