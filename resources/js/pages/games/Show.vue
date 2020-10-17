<template>

    <div>

        <div v-if="error" class="p-12 rounded-xl text-center text-4xl text-gray-600 font-semibold uppercase border-2 border-dashed">
            Game Not Found
        </div>

        <div v-if="game">

            <h1>
                {{ game.title }}
            </h1>

            <div v-if="board">

                <div class="flex flex-wrap items-stretch">

                    <div v-for="card in orderedBoardCards"
                         :style="{ width: `${colWidth}%` }"
                         class="p-2">

                        <div :style="{ fontSize: card.id ? `${calculateFontSize(card.title)}rem` : undefined }"
                             :class="[
                                 ...(card.id ? ['cursor-pointer', 'hover:bg-blue-500', 'hover:text-white'] : []),
                                 ...(card.id && card.pivot.checked ? ['bg-blue-500', 'text-white'] : [])
                             ]"
                             @click="checkCard(card)"
                             class="flex items-center text-center p-3 rounded-md bg-white shadow-md h-full break-words transition-colors duration-100 select-none">
                            {{ card.title }}
                        </div>

                    </div>

                </div>

            </div>

            <div v-if="!board">

                <div class="card w-full md:w-1/2 mx-auto">

                    <h2>
                        Start new Board
                    </h2>

                    <div class="card-body">

                        <p>
                            Welcome to this weird Bingo game. It looks like you have not started
                            a board yet.
                        </p>

                    </div>

                    <div class="card-footer">

                        <div @click="start" :disabled="processing" class="button button-blue">
                            Start game
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</template>

<script>
    import { mapActions, mapGetters } from 'vuex';

    export default {

        data: () => ({
            loading: true,
            error: null,
            processing: false
        }),

        computed: {

            ...mapGetters('games', [
                'games',
                'boards',
                'previousGames'
            ]),

            id() {
                return this.$route.params.game;
            },

            game() {
                return this.games.find(game => game.id === this.id);
            },

            board() {
                return this.boards.find(board => board.game.id === this.id);
            },

            boardCards() {
                return this.board.cards || [];
            },

            orderedBoardCards() {

                const cards = [
                    ...(this.boardCards || []).sort((a, b) => a.pivot.order - b.pivot.order)
                ];

                for (let i = 0; i < (this.cols * this.rows) - cards.length; i++) {
                    cards.push({});
                }

                return cards;
            },

            previousGame() {
                return this.previousGames.find(previousGame => previousGame.game === this.id);
            },

            // Board

            cols() {
                return Math.ceil(Math.sqrt(this.boardCards.length || 1));
            },

            rows() {
                return Math.ceil(this.boardCards.length / this.cols);
            },

            colWidth() {
                return 100 / Math.floor(this.cols);
            }

        },

        created() {
            this
                .getGame({ game: this.id })
                .then(({ game }) => {
                    this.loading = false;
                })
                .catch(error => this.error = error);

            if (this.previousGame && this.previousGame.board) {
                this
                    .getBoard({ board: this.previousGame.board });
            }
        },

        methods: {

            ...mapActions('games', [
                'getGame',
                'getBoard',
                'createBoard',
                'updateBoardCard'
            ]),

            checkCard(card) {

                if (!card.id) {
                    return;
                }

                this.updateBoardCard({ boardCard: card.pivot.id, checked: !card.pivot.checked });
            },

            start() {

                if (this.processing) {
                    return;
                }

                this.processing = true;

                this
                    .createBoard({ game: this.id })
                    .finally(() => this.processing = false);
            },

            calculateFontSize(text) {

                const mapping = {
                    50: 1.0,
                    40: 1.1,
                    30: 1.2,
                    20: 1.3,
                    10: 1.4
                };

                return mapping[Object.keys(mapping).find(length => text.length <= parseInt(length))] || 1;
            }
        }

    };

</script>
