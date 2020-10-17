const form = require('./resources/js/tailwind/form');
const button = require('./resources/js/tailwind/button');

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: [
                    'IBM Plex Sans',
                    'BlinkMacSystemFont',
                    '-apple-system',
                    'Helvetica Neue',
                    'sans-serif'
                ]
            }
        }
    },
    variants: {},
    plugins: [
        require('@tailwindcss/typography'),
        form,
        button
    ]
};
