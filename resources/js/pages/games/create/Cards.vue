<template>

    <div>

        <h1>
            {{ create.title }}
        </h1>

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
