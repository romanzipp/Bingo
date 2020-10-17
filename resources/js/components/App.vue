<template>

    <main>

        <Header />

        <main class="container mx-auto dark:bg-black">

            <div class="mt-12 px-4">

                <router-view />

            </div>

        </main>

        <Footer />

    </main>

</template>

<script>
    import Header from './layout/Header';
    import Footer from './layout/Footer';

    export default {

        components: {
            Header,
            Footer
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
