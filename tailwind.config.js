/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors');

module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './vendor/filament/**/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: colors.sky,
        secondary: colors.teal,
        danger: colors.rose,
        success: colors.green,
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
};
