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
        },

        created() {

            this.updateIcons();

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', this.updateIcons);
        },

        methods: {

            updateIcons() {

                const scheme = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';

                document.head.querySelectorAll('link[rel="icon"]').forEach(element => element.href = element.dataset[scheme]);
            }

        }

    };

</script>
