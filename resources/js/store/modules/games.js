import axios from './../../common/axios';
import { CREATE_GAME_TEXT, CREATE_GAME_TITLE, PREVIOUS_GAMES } from '../../constants/local-storage';

const state = {
    createTitle: null,
    createCards: [],
    games: [],
    previousGames: []
};

const getters = {
    createTitle: state => state.createTitle,
    createCards: state => state.createCards,
    filteredCreateCards: state => state.createCards.filter(card => !!card),
    games: state => state.games,
    previousGames: state => state.previousGames
};

const actions = {

    createGame({ commit }, { title, cards }) {
        return new Promise((resolve, reject) => {
            axios
                .post(`games`, {
                    title,
                    cards
                })
                .then(response => {
                    commit('addGame', response.data.game);
                    resolve(response.data);
                })
                .catch(error => reject(error));
        });
    },

    getGame({ commit }, { id }) {
        return new Promise((resolve, reject) => {
            axios
                .get(`games/${id}`)
                .then(response => {
                    commit('addGame', response.data.game);
                    resolve(response.data);
                })
                .catch(error => reject(error));
        });
    },

    clearCreate({ commit }) {
        commit('setCreateTitle', null);
        commit('setCreateCards', []);
    }

};

const mutations = {

    loadDefaults(state) {

        if (CREATE_GAME_TITLE in localStorage) {
            state.createTitle = localStorage[CREATE_GAME_TITLE];
        }

        if (CREATE_GAME_TEXT in localStorage) {
            state.createCards = JSON.parse(localStorage[CREATE_GAME_TEXT]);
        }

        if (PREVIOUS_GAMES in localStorage) {
            state.previousGames = JSON.parse(localStorage[PREVIOUS_GAMES]);
        }
    },

    addGame(state, game) {

        const existing = state.games.find(g => g.id === game.id);

        if (existing) {
            return;
        }

        state.games.push(game);

        let previousGames = state.previousGames;

        previousGames = previousGames.filter(previous => previous.id !== game.id);

        previousGames.push({
            id: game.id,
            secret: game.secret
        });

        localStorage[PREVIOUS_GAMES] = JSON.stringify(previousGames);
    },

    setCreateTitle(state, title) {

        state.createTitle = title;

        if (title) {
            localStorage[CREATE_GAME_TITLE] = title;
        } else {
            delete localStorage[CREATE_GAME_TITLE];
        }
    },

    setCreateCards(state, cards) {

        state.createCards = cards;

        if (cards.length) {
            localStorage[CREATE_GAME_TEXT] = JSON.stringify(cards);
        } else {
            delete localStorage[CREATE_GAME_TEXT];
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
