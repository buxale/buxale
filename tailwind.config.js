module.exports = {
    theme: {
        fontFamily: {
            'headings': ["DM Sans", 'sans-serif']
        },
        extend: {
            colors: {
                brand: '#52DE97',
            }
        },
        screens: {
            xs: '350px',
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: '1280px',
            '2xl': '1500px',
            '3xl': '1980px'
        }
    },
    variants: {},
    plugins: [
        require('@tailwindcss/ui'),
        require('tailwindcss-plugins/pagination')
    ],
}
