const mix = require('laravel-mix');

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
    .js('resources/js/bootstrap.js', 'public/js')
    .js('resources/js/menu-url.js', 'public/js')
    .js('resources/js/classes/AdminEvents.js', 'public/js/classes')
    .js('resources/js/classes/Products.js', 'public/js/classes')
    .js('resources/js/classes/Query.js', 'public/js/classes')
    .js('resources/js/classes/User.js', 'public/js/classes')
    .js('resources/js/classes/Row.js', 'public/js/classes')
    .js('resources/js/classes/ColorsCount.js', 'public/js/classes')
    .sass('resources/sass/app.scss', 'public/css');
