/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme')

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      keyframes: {
        'bounce-right': {
          '0%, 100%': { transform: 'translateX(-25%)', 'animation-timing-function': 'cubic-bezier(0.8, 0, 1, 1)' },
          '50%': { transform: 'translateX(0)', 'animation-timing-function': 'cubic-bezier(0, 0, 0.2, 1)' },
        },
      },
      animation: {
        'bounce-right': 'bounce-right 1s infinite',
      },
      fontFamily: {
        'game': ['"Home Video"', 'Inter', ...defaultTheme.fontFamily.sans],
        'inter': ['Inter', ...defaultTheme.fontFamily.sans],
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
    }
  },
  plugins: [],
}
