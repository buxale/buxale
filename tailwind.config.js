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
    },
    variants: {},
    plugins: [
        require('@tailwindcss/ui'),
        require('tailwindcss-plugins/pagination')
    ],
}
