/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./app/Views/**/*.php', './public/js/*.js'],
  theme: {
    extend: {
      fontFamily: {
        inter: ['Inter', 'sans-serif'],
      },
    },
  },
  daisyui: {
    themes: ['corporate'],
  },
  plugins: [require('daisyui'), require('@tailwindcss/typography')],
};
