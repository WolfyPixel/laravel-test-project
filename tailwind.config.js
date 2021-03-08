const colors = require('tailwindcss/colors')

module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
      colors:{
          transparent: 'transparent',
          current: 'currentColor',
          black: colors.black,
          white: colors.white,
          gray: colors.coolGray,
          red: colors.red,
          yellow: colors.amber,
          blue: colors.blue,
          primary: '#03701e',
          secondary: '#09a323',
      }
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
