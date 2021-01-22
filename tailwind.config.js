const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    purge: [
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                serif: ["Rockwell Nova Cond", ...defaultTheme.fontFamily.serif],
                mono: ["Terminal One", ...defaultTheme.fontFamily.mono],
            },

            backgroundImage: theme => ({
                'gradient-to-r-slanted': 'linear-gradient(87deg, var(--tw-gradient-stops))',
            }),

            fontSize: {
                "8xl": "6rem",
                "9xl": "9rem",
                "10xl": "11rem",
            },

            colors: {
                gray: {
                    ...defaultTheme.colors.gray,
                    800: "#353738",
                },
                yellow: {
                    ...defaultTheme.colors.yellow,
                    200: "#fffdc1",
                    400: "#f5ff00",
                },
                pink: {
                    ...defaultTheme.colors.pink,
                    400: "#fc579d",
                },
                red: {
                    ...defaultTheme.colors.red,
                    800: "#b10000",
                    900: "#4d4141",
                },
            },

            letterSpacing: {
                wider: ".08em",
                widest: ".3em",
            },

            minHeight: {
                96: "24rem",
            },
        },
    },
    variants: {
        backgroundColor: ["responsive", "hover", "focus", "active"],
    },
};
