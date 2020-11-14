const { colors, fontFamily } = require('tailwindcss/defaultTheme')

module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    extend: {
      spacing: {
        '3/4': '75%',
      },

      fontFamily: {
        serif: ['Rockwell Nova Cond', ...fontFamily.serif],
        mono: ['Terminal One', ...fontFamily.mono],
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
      letterSpacing: {
        wider: '.08em',
        widest: '.3em',
      },

      minHeight: {
        '96': '24rem'
      }
    },
  },
  variants: {},
  plugins: [],
}
