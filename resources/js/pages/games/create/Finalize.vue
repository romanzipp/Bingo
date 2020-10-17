<template>

    <div>

        <h1>
            {{ title }}
        </h1>

        <div class="card w-full md:w-1/2 mx-auto">

            <h2>
                Create game
            </h2>

            <div class="card-body">

                <div class="flex flex-wrap -mx-2 mt-6">

                    <div v-for="card of cards"
                         class="bg-white dark:bg-gray-800 shadow-md m-2 px-2 py-1 rounded text-sm">
                        {{ card }}
                    </div>

                </div>

                <p class="mt-6 text-xs">
                    Notice: You can not edit the game afterwards
                </p>

            </div>

            <div class="card-footer">

                <div @click="submit" :disabled="loading" class="button button-blue w-full">
                    Create game
                </div>

            </div>

        </div>

    </div>

</template>


<script>
    import { mapActions, mapGetters } from 'vuex';

    export default {

        data: () => ({
            loading: false
        }),

        computed: {

            ...mapGetters('games', {
                title: 'createTitle',
                cards: 'filteredCreateCards'
            })

        },

        methods: {

            ...mapActions('games', [
                'createGame',
                'clearCreate'
            ]),

            submit() {

                this.loading = true;

                this
                    .createGame({
                        title: this.title,
                        cards: this.cards
                    })
                    .then(({ game }) => {
                        this.redirect(game);
                        this.clearCache();
                    })
                    .finally(() => this.loading = false);
            },

            redirect(game){
                this.$router.push({
                    name: 'games.show',
                    params: {
                        game: game.id
                    }
                })
            },

            clearCache(){
                this.clearCreate();
            }
        }

    };

</script>
