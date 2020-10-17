const plugin = require('tailwindcss/plugin');

module.exports = plugin(function ({ addBase, theme }) {

    addBase({

        'body': {
            backgroundColor: theme('colors.background.light'),
            color: theme('colors.gray.900'),
            fontFamily: theme('fontFamily.sans'),
            '-webkit-font-smoothing': 'auto',
            '-moz-osx-font-smoothing': 'auto',
            '@screen dark': {
                backgroundColor: theme('colors.background.dark'),
                color: theme('colors.white')
            }
        },

        'h1': {
            fontSize: theme('fontSize.3xl'),
            marginBottom: theme('margin.8'),
            fontWeight: theme('fontWeight.semibold'),
            '@screen md': {
                fontSize: theme('fontSize.5xl')
            }
        }

    });

});
