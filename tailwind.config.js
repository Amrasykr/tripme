const defaultTheme = require("tailwindcss/defaultTheme");
const plugin = require("tailwindcss/plugin");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        themeVariants: ["dark"],
        Forms: (theme) => ({
            default: {
                "input, textarea": {
                    "&::placeholder": {
                        color: theme("colors.gray.400"),
                    },
                },
            },
        }),
        extend: {
            maxHeight: {
                0: "0",
                xl: "36rem",
            },
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#78C51C",
                secondary: "#2B6F2B",
                tertiary: "#043F2D",
                second_white: "#EDF2E2",
                white: "#FAFCF5",
                alternate: "#B2DAB2",
                black: "#242524",
            },
        },
    },
    variants: {
        backgroundColor: ["hover", "focus", "active", "odd"],
        display: ["responsive", "dark"],
        textColor: ["focus-within", "hover", "active"],
        placeholderColor: ["focus"],
        borderColor: ["focus", "hover"],
        boxShadow: ["focus"],
    },
    plugins: [require("@tailwindcss/forms")],
};
