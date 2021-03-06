import axios from './../../common/axios';
import { CREATE_GAME_TEXT, CREATE_GAME_TITLE, PREVIOUS_GAMES } from '../../constants/local-storage';

const state = {
    createTitle: null,
    createCards: [],
    games: [],
    boards: [],
    previousGames: []
};

const getters = {
    createTitle: state => state.createTitle,
    createCards: state => state.createCards,
    filteredCreateCards: state => state.createCards.filter(card => !!card),
    games: state => state.games,
    boards: state => state.boards,
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

    getGame({ commit }, { game }) {
        return new Promise((resolve, reject) => {
            axios
                .get(`games/${game}`)
                .then(response => {
                    commit('addGame', response.data.game);
                    resolve(response.data);
                })
                .catch(error => reject(error));
        });
    },

    createBoard({ commit }, { game }) {
        return new Promise((resolve, reject) => {
            axios
                .post(`boards`, {
                    game_id: game
                })
                .then(response => {
                    commit('addBoard', response.data.board);
                    resolve(response.data);
                })
                .catch(error => reject(error));
        });
    },

    getBoard({ commit }, { board }) {
        return new Promise((resolve, reject) => {
            axios
                .get(`boards/${board}`)
                .then(response => {
                    commit('addBoard', response.data.board);
                    resolve(response.data);
                })
                .catch(error => reject(error));
        });
    },

    updateBoardCard({ commit }, { boardCard, checked }) {
        return new Promise((resolve, reject) => {
            axios
                .patch(`board-cards/${boardCard}`, {
                    checked: checked ? 1 : 0
                })
                .then(response => {
                    commit('updateBoardCard', response.data.card);
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

    addBoard(state, board) {

        if (state.boards.find(b => b.id === board.id)) {
            return;
        }

        state.boards.push(board);

        this.commit('games/updatePreviousGames', { game: board.game, board });
    },

    addGame(state, game) {

        if (state.games.find(g => g.id === game.id)) {
            return;
        }

        state.games.push(game);

        this.commit('games/updatePreviousGames', { game });
    },

    updateBoardCard(state, card) {

        const board = this.getters['games/boards'].find(board => board.game.id === card.game.id);

        state.boards = state.boards.map(b => {

            if (b.id !== board.id) {
                return b;
            }

            b.cards = b.cards.map(c => c.id !== card.id ? c : { ...c, ...{ pivot: card.pivot } });

            return b;
        });
    },

    updatePreviousGames(state, { game, board }) {

        const existingGame = state.previousGames.find(previous => previous.game === game.id);

        const push = {
            game: game.id,
            secret: existingGame ? existingGame.secret : game.secret,
            board: board ? board.id : (existingGame ? existingGame.board : null)
        };

        if (existingGame) {

            state.previousGames = state.previousGames.map(previousGame => previousGame.game === game.id ? push : previousGame);

        } else {

            state.previousGames.push(push);

        }

        localStorage[PREVIOUS_GAMES] = JSON.stringify(state.previousGames);
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
