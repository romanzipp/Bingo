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

                <input v-model="title" type="text" class="input" placeholder="Title">

            </div>

            <div class="card-footer">

                <router-link :disabled="!title" :to="{ name: 'games.createCards' }" class="button button-blue">
                    Continue
                </router-link>

            </div>

        </div>

    </div>

</template>

<script>

    export default {

        computed: {

            title: {
                get() {
                    return this.$store.getters['games/createTitle'];
                },
                set(value) {
                    return this.$store.commit('games/setCreateTitle', value);
                }
            }

        }

    };

</script>
