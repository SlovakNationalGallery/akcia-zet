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
                'gradient-to-r-270': 'linear-gradient(270deg, var(--tw-gradient-stops))',
                'gradient-to-r-260': 'linear-gradient(260deg, var(--tw-gradient-stops))',
                'gradient-to-r-334': 'linear-gradient(334deg, var(--tw-gradient-stops))',
                'gradient-to-r-252': 'linear-gradient(252deg, var(--tw-gradient-stops))',
            }),

            fontSize: {
                "8xl": "6rem",
                "9xl": "9rem",
                "10xl": "11rem",
            },

            colors: {
                gray: {
                    ...defaultTheme.colors.gray,
                    300: "#D0D0D0",
                    400: "#A5A5A5",
                    500: "#918585",
                    700: "#767474",
                },
                yellow: {
                    ...defaultTheme.colors.yellow,
                    200: "#fffdc1",
                    400: "#FFFA60",
                },
                pink: {
                    ...defaultTheme.colors.pink,
                    400: "#F4538A",
                    600: "#CE4369"
                },
                red: {
                    ...defaultTheme.colors.red,
                    800: "#655959",
                },
            },

            letterSpacing: {
                wider: ".08em",
                widest: ".3em",
            },

            height: {
                "1/2-screen": "50vh",
                "3/4-screen": "75vh",
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
