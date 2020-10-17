const plugin = require('tailwindcss/plugin');

module.exports = plugin(function ({ addComponents, theme }) {

    addComponents({
        '.card': {
            backgroundColor: theme('colors.white'),
            borderRadius: theme('borderRadius.lg'),
            boxShadow: theme('boxShadow.lg'),
            padding: theme('padding.6'),
            'h2': {
                fontSize: theme('fontSize.3xl'),
                fontWeight: theme('fontWeight.semibold'),
                marginBottom: theme('margin.6')
            },
            '.card-body': {},
            '.card-footer': {
                marginTop: theme('margin.6')
            }
        }
    });

});
