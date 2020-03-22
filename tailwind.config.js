module.exports = {
    theme: {
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
