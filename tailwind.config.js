const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            colors: {
                teal: colors.teal,
                rose: colors.rose,
                orange: colors.orange,
                fuchsia: colors.fuchsia,
                sky: colors.sky,
                cyan: colors.cyan,
                emerald: colors.emerald,
                lime: colors.lime,
                amber: colors.amber,
                slate: colors.slate,
            },
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
                serif: ["Merriweather", "serif"],
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
