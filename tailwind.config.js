const { colors } = require('tailwindcss/defaultTheme')

module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    extend: {
      spacing: {
        '4/5': '80%',
      },

      fontSize: {
        '8xl': '6rem',
      },
      colors: {
        gray: {
          ...colors.gray,
          '800': '#3c3838',
        },
        yellow: {
          ...colors.yellow,
          '200': '#fffdc1',
          '400': '#f5ff00',
        },
        pink: {
          ...colors.pink,
          '400': '#fc579d',
        },
      },
    },
  },
  variants: {},
  plugins: [],
}
