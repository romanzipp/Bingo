<template>

    <div>

        <div class="card w-full md:w-1/2 mx-auto">

            <h2>
                Bingo
            </h2>

            <div class="card-body space-y-4">

                <p>
                    Create public shareable interactive bingo games with unlimited players.
                    No account required. No ads. No bullshit.
                </p>

                <p>
                    When sharing a bingo game, each player will receive an own randomized board.
                </p>

            </div>

            <div class="card-footer">

                <router-link :to="{ name: 'games.create.start' }" class="button button-blue">
                    Create game
                </router-link>

            </div>

        </div>

        <div v-if="games.length > 0" class="mt-12">

            <h1>
                Your previous games
            </h1>

            <div class="flex flex-wrap -mx-4">

                <div v-for="game in games" class="w-1/3 p-4">

                    <div class="card">

                        <h3>
                            {{ game.title }}
                        </h3>

                        <div class="card-footer">

                            <router-link :to="{ name: 'games.show', params: { game: game.id }}" class="button button-blue">
                                Show board
                            </router-link>

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

        computed: {
            ...mapGetters('games', [
                'games',
                'previousGames'
            ])
        },

        created() {
            this.previousGames.forEach(previous => {
                this.getGame({ id: previous.id });
            });
        },

        methods: {
            ...mapActions('games', [
                'getGame'
            ])
        }

    };

</script>
