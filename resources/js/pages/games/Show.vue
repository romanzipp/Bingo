<template>

    <div>

        <div v-if="error" class="p-12 rounded-xl text-center text-4xl text-gray-600 font-semibold uppercase border-2 border-dashed">
            Game Not Found
        </div>

        <div v-if="game">

            <h1>
                {{ game.title }}
            </h1>

        </div>

    </div>

</template>

<script>
    import { mapActions, mapGetters } from 'vuex';

    export default {

        data: () => ({
            loading: true,
            error: null
        }),

        computed: {

            ...mapGetters('games', [
                'games'
            ]),

            id() {
                return this.$route.params.game;
            },

            game() {
                return this.games.find(game => game.id === this.id);
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
                'getGame'
            ])
        }
    };

</script>
