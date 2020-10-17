<template>

    <div>

        <Header></Header>

        <div class="container mx-auto">

            <div class="mt-12">

            <router-view />

            </div>

        </div>

    </div>

</template>

<script>
    import Header from './layout/Header';

    export default {

        components: {
            Header
        }

    };

</script>
