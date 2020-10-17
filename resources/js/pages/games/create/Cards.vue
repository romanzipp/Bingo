<template>

    <div>

        <h1>
            {{ title }}
        </h1>

        <div class="card">

            <div class="card-body">

                <textarea v-model="text" id="" cols="30" rows="10" class="input" placeholder="Words"></textarea>

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

    export default {

        computed: {

            ...mapGetters('games', {
                title: 'createTitle',
                cards: 'createCards'
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
