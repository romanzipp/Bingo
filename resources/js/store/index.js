import Vue from 'vue';
import Vuex from 'vuex';
import auth from './modules/auth';
import games from './modules/games';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        auth,
        games
    }
});

export default store;
