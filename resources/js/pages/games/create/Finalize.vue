<template>

    <div>

        <h1>
            {{ title }}
        </h1>

    </div>

</template>


<script>
    import { mapGetters } from 'vuex';

    export default {

        computed: {

            ...mapGetters('games', {
                title: 'createTitle',
                cards: 'filteredCreateCards'
            })

        }

    };

</script>
