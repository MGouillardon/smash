/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./resources/**/*.{html,js}'],
    theme: {
        extend: {
            colors: {
                primary: '#E9F1D7',
                secondary: '#280004 '
            },
            fontFamily: {
                primary: ['Humane']
            }
        },
    },
    plugins: [],
};
