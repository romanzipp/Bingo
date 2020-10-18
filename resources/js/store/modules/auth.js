import { AUTH_NAME } from '../../constants/local-storage';

const state = {
    name: null
};

const getters = {
    name: state => state.name
};

const actions = {};

const mutations = {

    loadDefaults(state) {

        if (AUTH_NAME in localStorage) {
            state.name = localStorage[AUTH_NAME];
        }
    },

    setName(state, name) {
        state.name = name;
        localStorage[AUTH_NAME] = name;
    }

};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
