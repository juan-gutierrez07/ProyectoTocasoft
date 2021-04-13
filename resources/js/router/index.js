import Vue from  "vue";
import VueRouter from "vue-router";
import InicioEstablecimientos from '../components/InicioEstablecimientos';
import InformacionEstablecimiento from '../components/InformacionEstablecimiento';



Vue.use(VueRouter);

const routes = [
    {
        path:'/sitios',
        component: InicioEstablecimientos,

   
    
    },
    {

    path:'/establecimiento/:id',
    name:"establecimientos",
    component: InformacionEstablecimiento
    }
 
]
const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;