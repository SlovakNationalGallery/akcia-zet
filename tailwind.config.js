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
                    400: "#A5A5A5",
                    700: "#767474",
                    800: "#655959",
                },
                yellow: {
                    ...defaultTheme.colors.yellow,
                    200: "#fffdc1",
                    400: "#FFFA60",
                },
                pink: {
                    ...defaultTheme.colors.pink,
                    400: "#F4538A",
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
