import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);

export default new Vuex.Store({

    state:{
        hoteles:[],
        establecimiento:{},
        establecimientos:[]
    },
    mutations:{  // parte del state general en donde se realizar diferentes metodos que haran una accción dependiendo de data
        Agregar_hoteles(state,data){
            state.hoteles = data
        },
        Agregar_establecimiento(state,data){
            state.establecimiento = data;

        },
        Agregar_establecimientos(state,data){
            state.establecimientos = data;
        }
    },
    getters:{
        ObtenerEstablecimiento: state =>{
            return state.establecimiento;
        },
        obtenerImagenes: state =>{
                return state.establecimiento.imagenes;
        },
        obtenerEstablecimientos: state =>{
            return state.establecimientos;
        }
    }
});