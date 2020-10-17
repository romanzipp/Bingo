import axios from 'axios';

const state = {
    create: {
        title: null
    }
};

const getters = {
    create: state => state.create
};

const actions = {

    fetchData({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get(`/data/data.json`)
                 .then(response => {
                     commit('setData', response);
                     resolve();
                 })
                 .catch(e => reject(e));
        });
    }

};

const mutations = {

    setCreateTitle(state, title) {
        state.create.title = title;
    }

};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
