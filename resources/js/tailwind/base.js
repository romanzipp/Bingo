const plugin = require('tailwindcss/plugin');

module.exports = plugin(function ({ addBase, theme }) {

    addBase({

        'body': {
            color: theme('colors.gray.900'),
            backgroundColor: '#fbfbfb',
            fontFamily: theme('fontFamily.sans'),
            '-webkit-font-smoothing': 'auto',
            '-moz-osx-font-smoothing': 'auto'
        },

        'h1': {
            fontSize: theme('fontSize.5xl'),
            marginBottom: theme('margin.8'),
            fontWeight: theme('fontWeight.semibold')
        }

    });

});
