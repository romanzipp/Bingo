const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            'vue$': 'vue/dist/vue.esm.js',
            '@': __dirname + '/resources/js'
        }
    }
});

if (mix.inProduction()) {
    mix.version();
}

mix.js('resources/js/app.js', 'public/js');

mix.sass('resources/sass/app.scss', 'public/css')
   .options({
       processCssUrls: false,
       postCss: [tailwindcss('./tailwind.config.js')]
   });

mix.disableNotifications();
