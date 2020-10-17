<template>

    <div>

        <h1>
            Create Game
        </h1>

        <div class="card w-full md:w-1/2 mx-auto">

            <h2>
                General Information
            </h2>

            <div class="card-body">

                <input v-model="create.title" type="text" class="input" placeholder="Title">

            </div>

            <div class="card-footer">

                <router-link :disabled="!create.title" :to="{ name: 'games.create.cards' }" class="button button-blue">
                    Continue
                </router-link>

            </div>

        </div>

    </div>

</template>

<script>
    import { mapGetters } from 'vuex';

    export default {

        computed: {

            ...mapGetters('games', [
                'create'
            ])

        }

    };

</script>
