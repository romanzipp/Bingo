<template>

    <div>

        <h1>
            {{ title }}
        </h1>

        <div class="card">

            <h2>
                Enter Words
            </h2>

            <div class="card-body">

                <textarea v-model="text" id="" cols="30" rows="10" class="input" placeholder="Words"></textarea>

            </div>

            <div class="card-footer flex justify-between">

                <router-link :to="{ name: 'games.create.finish' }" :disabled="cards.length < minCards" class="button button-blue">
                    Continue
                </router-link>

                <router-link :to="{ name: 'games.create.start' }" class="button button-black">
                    Back
                </router-link>

            </div>

        </div>

        <div class="flex flex-wrap -mx-2 mt-6">

            <div v-for="card of cards"
                 class="bg-white shadow-md m-2 px-2 py-1 rounded text-sm">
                {{ card }}
            </div>

        </div>

    </div>

</template>

<script>
    import { mapGetters } from 'vuex';
    import { MINIMUM_CARDS } from './../../../constants/game';

    export default {

        data: () => ({
            minCards: MINIMUM_CARDS
        }),

        computed: {

            ...mapGetters('games', {
                title: 'createTitle',
                cards: 'filteredCreateCards'
            }),

            text: {
                get() {
                    return this.$store.getters['games/createCards'].join('\n');
                },
                set(value) {
                    return this.$store.commit('games/setCreateCards', (value || '').split('\n'));
                }
            }

        }

    };

</script>
