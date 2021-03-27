/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import 'sweetalert2/dist/sweetalert2.min.css';
import router from './router';
import VueSweetalert2 from 'vue-sweetalert2';


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('pagina-principal', require('./components/PaginaPrincipal.vue').default);
Vue.component('eliminar-establecimiento', require('./components/EliminarEstablecimiento.vue').default);
Vue.component('eliminar-imagen-sitio', require('./components/EliminarImagenSitio.vue').default);
Vue.use(VueSweetalert2);
console.log(Vue.prototype);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
require('./mapa');
require("./dropzone");
require('./dtable');
require('./metodosjs');
