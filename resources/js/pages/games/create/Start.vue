<template>

    <div>

        <h1>
            Create Game
        </h1>

        <div class="card w-full md:w-1/2 mx-auto">

            <h2>
                General Information
            </h2>

            <div class="card-body space-y-6">

                <div>

                    <label class="label required" for="start-game-title">
                        Title
                    </label>

                    <input v-model="title" type="text" class="input" placeholder="Apple Keynote" id="start-game-title">

                </div>

                <div>

                    <label class="label" for="start-game-name">
                        Your name
                    </label>

                    <input v-model="name" type="text" class="input" placeholder="John Doe" id="start-game-name">

                </div>


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
            },

            name: {
                get() {
                    return this.$store.getters['auth/name'];
                },
                set(value) {
                    return this.$store.commit('auth/setName', value);
                }
            }

        }

    };

</script>
