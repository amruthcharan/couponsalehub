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

mix.scripts([
        'resources/js/v1/jquery.min.js',
        'resources/js/v1/tether.min.js',
        'resources/js/v1/bootstrap.min.js',
        'resources/js/v1/custom.js',
    ], 'public/js/v1.js')
    .styles([
            'resources/css/v1/bootstrap.css',
            'resources/css/v1/style.css',
            'resources/css/v1/responsive.css',
            'resources/css/v1/colors.css',
            'resources/css/v1/core.css',
        ], 'public/css/v1.css');
