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
            colors: {
                background: "#f7f8fc",
                blue: "#328af1",
                "blue-hover": "#2879bd",
                yellow: "#ffc73c",
                red: "#ec454f",
                "blue-hover": "#2879bd",
                green: "#1aab8b",
                purple: "#8b60ed",
            },
            spacing: {
                .75: "0.188rem",
                22: "5.5rem",
                70: "17.5rem",
                75: "18.75rem",
                175: "43.75rem",
            },
            maxWidth: {
                custom: "62.5rem",
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
