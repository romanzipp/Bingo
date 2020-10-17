<template>

    <div>

        <div v-if="error" class="p-12 rounded-xl text-center text-4xl text-gray-600 font-semibold uppercase border-2 border-dashed">
            Game Not Found
        </div>

        <div v-if="game">

            <h1>
                {{ game.title }}
            </h1>

            <div v-if="!board">

                <div class="card w-full md:w-1/2 mx-auto">

                    <h2>
                        Start new Board
                    </h2>

                    <div class="card-body">

                        <p>
                            Welcome to this weird Bingo game. It looks like you have not strated
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
            }

        },

        created() {
            this
                .getGame({ id: this.id })
                .then(({ game }) => {
                    this.loading = false;
                })
                .catch(error => this.error = error);
        },

        methods: {

            ...mapActions('games', [
                'getGame',
                'createBoard'
            ]),

            start() {

                if (this.processing) {
                    return;
                }

                this.processing = true;

                this
                    .createBoard({ game: this.id })
                    .finally(() => this.processing = false);
            }
        }

    };

</script>
