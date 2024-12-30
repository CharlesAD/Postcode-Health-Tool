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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#1a73e8',
                    light: '#4d90fe',  
                    dark: '#174ea6',  
                },
                secondary: '#f8f9fa', 
                accent: '#ffa726',   
            },
            spacing: {
                128: '32rem', 
                144: '36rem',
            },
            borderRadius: {
                xl: '1.5rem', 
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'), 
        require('@tailwindcss/typography'), 
    ],
};
