const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/auth.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    })
    .version();

/* custom webpack mix config */
mix.webpackConfig({
    watchOptions: {
        aggregateTimeout: 2000,
        poll: 2000,
        ignored: /node_modules/
        /*ignored: [
            path.resolve(__dirname, 'node_modules'),
            path.resolve(__dirname, 'vendor'),
        ]*/
    }
});
