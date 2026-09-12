import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                obsidian: '#080914',
                'cinematic-navy': '#101229',
                'surface-dark': '#171936',
                'warm-white': '#F7F6F3',
                coral: '#FF4D42',
                'coral-hover': '#E94239',
                'lavender-text': '#B8BDE0',
                'muted-text': '#8D91A8',
            },
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
                serif: ['Cormorant Garamond', ...defaultTheme.fontFamily.serif],
            },
        },
    },
    plugins: [],
};
