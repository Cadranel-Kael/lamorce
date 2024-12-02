import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import tailwindCssAnimated from 'tailwindcss-animated';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            animation: {
                'slide-in-left': 'slide-in-left 0.3s ease-in-out',
                'slide-out-left': 'slide-in-left 0.3s ease-in-out reverse',
            },
            keyframes: {
                'slide-in-left': {
                    '0%': { transform: 'translateX(100%)' },
                    '100%': { transform: 'translateX(0)'},
                },
            },
            fontFamily: {
                sans: ['Rubik', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                1: '0.5rem',
                2: '0.625rem',
                3: '0.8125rem',
                4: '1rem',
                5: '1.25rem',
                6: '1.5625rem',
                7: '1.9375rem',
                8: '2.4375rem',
                9: '3.0625rem',
                10: '3.8125rem',
                11: '5.9375rem',
                12: '7.4375rem',
            },
            fontSize: {
                xs: ['0.625rem', { lineHeight: '1.5' }],
                sm: ['0.8125rem', { lineHeight: '1.5' }],
                base: ['1rem', { lineHeight: '1.5' }],
                lg: ['1.25rem', { lineHeight: '1.5' }],
                xl: ['1.5625rem', { lineHeight: '1.5' }],
                '2xl': ['1.9375rem', { lineHeight: '1.5' }],
                '3xl': ['2.4375rem', { lineHeight: '1.5' }],
                '4xl': ['3.0625rem', { lineHeight: '1.5' }],
                '5xl': ['3.8125rem', { lineHeight: '1.5' }],
            },
            colors: {
                white: '#ffffff',
                background: '#F6F5F0',
                primary: {
                    DEFAULT: '#fff23e',
                    50: '#fefee8',
                    100: '#feffc2',
                    200: '#fffc89',
                    300: '#fff23e',
                    400: '#fde412',
                    500: '#ecc906',
                    600: '#cc9e02',
                    700: '#a37105',
                    800: '#86580d',
                    900: '#724811',
                    950: '#432605',
                },
                gray: {
                    50: '#F6F6F6',
                    100: '#E7E7E7',
                    200: '#D1D1D1',
                    300: '#B0B0B0',
                    400: '#888888',
                    500: '#6D6D6D',
                    600: '#5D5D5D',
                    700: '#4F4F4F',
                    800: '#454545',
                    900: '#3D3D3D',
                    950: '#191919',
                },
                error: {
                    50: '#FDF4F3',
                    100: '#FBEAE8',
                    200: '#F7D5D4',
                    300: '#F0B3B1',
                    400: '#E78685',
                    500: '#DB5C5E',
                    600: '#C53942',
                    700: '#A62A36',
                    800: '#8B2632',
                    900: '#772430',
                    950: '#420F15',
                },
                success: {
                    50: '#F2FCF1',
                    100: '#DDFBDD',
                    200: '#BDF5BD',
                    300: '#8AEB8B',
                    400: '#5CDB5E',
                    500: '#28BF2B',
                    600: '#1B9E1D',
                    700: '#197C1B',
                    800: '#19621C',
                    900: '#165119',
                    950: '#072C09',
                },
                warning: {
                    50: '#FFFBEA',
                    100: '#FFF2C5',
                    200: '#FFE585',
                    300: '#FFD146',
                    400: '#FFBC1B',
                    500: '#FF9800',
                    600: '#E27100',
                    700: '#BB4C02',
                    800: '#983A08',
                    900: '#7C300B',
                    950: '#481700',
                },
            },
            borderRadius: {
                DEFAULT: '0.3125rem',
                'lg': '0.625rem',
            },
            boxShadow: {
                DEFAULT: '0 0 0.625rem 0 rgba(25, 25, 25, 0.1)',
            },
        },
    },

    plugins: [
        forms,
    ],
};
