const base = require('./resources/js/tailwind/base');
const card = require('./resources/js/tailwind/card');
const form = require('./resources/js/tailwind/form');
const button = require('./resources/js/tailwind/button');

module.exports = {
    theme: {
        extend: {

            colors: {

                background: '#fbfbfb',

                blue: {
                    100: '#E6F3FE',
                    200: '#C1E0FC',
                    300: '#9BCDFA',
                    400: '#50A8F6',
                    500: '#0583F2',
                    600: '#0576DA',
                    700: '#034F91',
                    800: '#023B6D',
                    900: '#022749'
                }

            },

            fontFamily: {
                sans: [
                    'IBM Plex Sans',
                    'BlinkMacSystemFont',
                    '-apple-system',
                    'Helvetica Neue',
                    'sans-serif'
                ]
            },

            screens: {
                dark: {
                    raw: '(prefers-color-scheme: dark)'
                }
            }

        }
    },
    variants: {},
    plugins: [
        require('@tailwindcss/typography'),
        base,
        card,
        form,
        button
    ]
};
