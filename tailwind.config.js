import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'pizza-orange': '#ff5400',
                'pets-orange-100': '#FFD255',
                'pets-orange-200': '#FFBE46',
                'pets-orange-300': '#FFA838',
                'pets-orange-400': '#FF952B',
                'pets-orange-500': '#FF7C1B',
                'pets-orange-600': '#FF690F',
                'material-theme-ocean': '#0F111A',
            }
        },
    },
    plugins: [],
};
