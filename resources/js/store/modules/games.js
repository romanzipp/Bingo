import { CREATE_GAME_TEXT, CREATE_GAME_TITLE } from './../../constants/local-storage';

const state = {
    createTitle: null,
    createCards: []
};

const getters = {
    createTitle: state => state.createTitle,
    createCards: state => state.createCards
};

const actions = {};

const mutations = {

    loadDefaults(state) {

        if (CREATE_GAME_TITLE in localStorage) {
            state.createTitle = localStorage[CREATE_GAME_TITLE];
        }

        if (CREATE_GAME_TEXT in localStorage) {
            state.createCards = JSON.parse(localStorage[CREATE_GAME_TEXT]);
        }
    },

    setCreateTitle(state, title) {

        state.createTitle = title;

        if (title) {
            localStorage[CREATE_GAME_TITLE] = title;
        }
    },

    setCreateCards(state, cards) {

        state.createCards = cards;

        if (cards.length) {
            localStorage[CREATE_GAME_TEXT] = JSON.stringify(cards);
        }
    }

};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
