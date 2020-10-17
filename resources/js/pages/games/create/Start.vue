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

                <component :is="canContinue ? 'router-link' : 'div'"
                           :disabled="!canContinue"
                           :to="{ name: 'games.create.cards' }"
                           class="button button-blue">
                    Continue
                </component>

            </div>

        </div>

    </div>

</template>

<script>

    export default {

        computed: {

            canContinue() {
                return !!this.title;
            },

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
