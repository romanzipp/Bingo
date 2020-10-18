module.exports = function ({ theme, addComponents }) {

    addComponents({

        '.input': {
            width: '100%',
            backgroundColor: theme('colors.gray.100'),
            padding: `${theme('margin.2')} ${theme('margin.3')}`,
            borderRadius: theme('borderRadius.default'),
            fontSize: theme('fontSize.sm'),
            color: theme('colors.gray.800'),
            border: `1px solid ${theme('colors.gray.300')}`,
            lineHeight: theme('leading.normal'),
            outline: 'none',
            transitionProperty: theme('transitionProperty.colors'),
            transitionDuration: theme('transitionDuration.100'),
            '&:focus': {
                borderColor: theme('colors.blue.500'),
                backgroundColor: theme('colors.blue.100')
            },
            '&::placeholder': {
                color: theme('colors.gray.500')
            },
            '&.input-error': {
                backgroundColor: theme('colors.red.100'),
                color: theme('colors.red.800'),
                borderColor: theme('colors.red.200'),
                '&::placeholder': {
                    color: theme('colors.red.300')
                }
            }
        },

        'label.label': {
            display: 'block',
            fontSize: theme('fontSize.xs'),
            color: theme('colors.gray.600'),
            marginBottom: theme('margin.1'),
            textTransform: 'uppercase',

            '&.required::before': {
                content: '*',
                color: theme('colors.red.500'),
            }
        },

        '&.checkbox-field': {
            display: 'flex',
            alignItems: 'center',
            'label': {
                marginBottom: 0,
                paddingLeft: theme('padding.2'),
                fontSize: theme('fontSize.sm')
            },
            'label, input[type="checkbox"]': {
                cursor: 'pointer'
            }
        }

    });

};
