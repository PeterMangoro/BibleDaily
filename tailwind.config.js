const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },

            backgroundImage: {           
                'bible': "url('/storage/background/bible.jpg')",
                'bible1': "url('/storage/background/bible1.jpg')",
                'bible2': "url('/storage/background/bible2.jpg')",
                'bible3': "url('/storage/background/bible3.jpg')",
                'bible4': "url('/storage/background/bible4.jpg')",
                'bible5': "url('/storage/background/bible5.jpg')",
                'bible6': "url('/storage/background/bible6.jpg')",
                'bible7': "url('/storage/background/bible7.jpg')",
                'bible8': "url('/storage/background/bible8.jpg')",
                'bible9': "url('/storage/background/bible9.jpg')",
                'bible10': "url('/storage/background/bible10.jpg')",
                'bible11': "url('/storage/background/bible11.jpg')",
              },
        },
    },

    plugins: [
        require('@tailwindcss/forms'), 
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),       
    ],
};
