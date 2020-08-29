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
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/app-two.scss', 'public/css')
    .sass('resources/sass/institutions-landing.scss', 'public/css')
    .sass('resources/sass/institutions-signup.scss', 'public/css')
    .sass('resources/sass/institutions-signin.scss', 'public/css')
    .sass('resources/sass/institutions-mystudents.scss', 'public/css')
    .sass('resources/sass/institutions-mystudents-edit.scss', 'public/css');