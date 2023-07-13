import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            minHeight: (theme) => ({
                ...theme('spacing'),
            }),
            keyframes: {
                expand: {
                    '0%': {transform: 'scaleX(0)'},
                    '100%': {transform: 'scaleX(1)'},
                }

            },
            animation: {
                'expand-in': 'expand 500ms ease-in-out forwards',
                'expand-out': 'expand 200ms ease-in-out forwards reverse',
            },
            fontFamily: {
                // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                'gotham': ["Gotham"],
                'luckiest-guy': ['"Luckiest Guy"'],
            },
            width: {
                '135': '540px',
                '175': '700px',
            },
            colors: {
                'parchment': '#F0E9D3',
                'sage': '#C3B888',
                'maize': '#EDC253',
                'bright-lavender': '#AD8CFF',
                'blue-violet': '#7154BA',
                'jacarta': '#3B266E',
            }
        },
    },

    plugins: [forms],
};
