import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        loading: true,
        state: {}
    },
    getters: {
        LOADING: state => {
            return state.loading;
        },
    },
    mutations: {
        SET_LOADING(state, loading) {
            localStorage.setItem('contract', contract.number);
            state.loading = loading;
        },
    },
    actions: {

    },
});
