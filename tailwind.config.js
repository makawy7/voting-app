import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors(theme) {
                return {
                    background: "#f7f8fc",
                    "blue-hover": "#2879bd",
                    blue: { ...theme.colors.blue, DEFAULT: "#328af1" },
                    yellow: { ...theme.colors.yellow, DEFAULT: "#ffc73c" },
                    red: { ...theme.colors.red, DEFAULT: "#ec454f" },
                    green: { ...theme.colors.green, DEFAULT: "#1aab8b" },
                    purple: { ...theme.colors.purple, DEFAULT: "#8b60ed" },
                    "blue-hover": "#2879bd",
                };
            },
            spacing: {
                0.75: "0.188rem",
                22: "5.5rem",
                37.5: "9.375rem",
                70: "17.5rem",
                75: "18.75rem",
                175: "43.75rem",
            },
            maxWidth: {
                custom: "80rem",
            },
            fontFamily: {
                sans: ["Open Sans", ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                xxs: "0.625rem",
            },
        },
    },

    plugins: [forms],
};
