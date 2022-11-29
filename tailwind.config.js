/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            container: {
                center: true,
                padding: {
                    DEFAULT: "1rem",
                    md: "4rem",
                    lg: "8rem",
                    xl: "12rem",
                },
            },
        },
        backgroundImage: {
            hero: "url('http://127.0.0.1:8000/images/hero.jpg')",
        },
    },
    plugins: [],
};
