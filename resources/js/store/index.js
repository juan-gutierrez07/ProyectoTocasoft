import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);

export default new Vuex.Store({

    state:{
        hoteles:[]
    },
    mutations:{  // parte del state general en donde se realizar diferentes metodos que haran una accción dependiendo de data
        Agregar_hoteles(state,data){
            state.hoteles = data
        }
    }
});