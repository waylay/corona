let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js').version()
    .js('resources/assets/js/dashboard.js', 'public/js')
    .js('resources/assets/js/lightbox.js', 'public/js')
    .js('resources/assets/js/slider.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css').version()
    .sass('resources/assets/sass/dashboard.scss', 'public/css')
    .sass('resources/assets/sass/nocontent.scss', 'public/css').version();
