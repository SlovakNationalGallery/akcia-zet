const { colors, fontFamily } = require('tailwindcss/defaultTheme')

module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    extend: {
      // scrolling-text.html
      animation: {
        'marquee-up-1': 'marquee-up-1 8s linear infinite',
        'marquee-up-2': 'marquee-up-2 8s linear 4s infinite',
      },
      keyframes: {
        'marquee-up-1': {
          from: {
            transform: 'translateY(100%)',
          },
          to: {
            transform: 'translateY(-100%)',
          },
        },
        'marquee-up-2': {
          from: {
            transform: 'translateY(0%)',
          },
          to: {
            transform: 'translateY(-200%)',
          },
        },
      },

      spacing: {
        '1/2': '50%',
        '3/4': '75%',
      },

      fontFamily: {
        serif: ['Rockwell Nova Cond', ...fontFamily.serif],
        mono: ['Terminal One', ...fontFamily.mono],
      },

      fontSize: {
        '8xl': '6rem',
        '9xl': '9rem',
        '10xl': '11rem',
      },

      colors: {
        gray: {
          ...colors.gray,
          '800': '#353738',
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
        red: {
          ...colors.red,
          '800': '#b10000',
          '900': '#4d4141',
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
  variants: {
    backgroundColor: ['responsive', 'hover', 'focus', 'active'],
  },
  plugins: [],
  purge: {
    enabled: process.env.NODE_ENV === 'production',
    content: [
      './public/**.html',
    ],
  }
}
