const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        fontSize: {
            'xs': '13px',
            'sm': '14px',
            'base': '16px',
            'lg': '18px',
            'xl': '20px',
            '2xl': '24px',
            '3xl': '30px',
            '4xl': '36px',
            '5xl': '48px',
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            blue: {
                3: '#0065FF',
                4: '#0747A6',
            },
            amber: {
                3: '#FFAB00',
                4: '#FF8B00',
            },
            rose: {
                3: '#E11D48',
                4: '#BE123C',
            },
            green: {
                3: '#00875A',
                4: '#006644',
            },
            gray: {
                1: '#DCDDE2',
                2: '#7A869A',
                3: '#253858',
                4: '#091E42',
            },
        },
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
