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
    .sass('resources/sass/app.scss', 'public/css');
mix.js('resources/js/jquery.min.js','public/js/jquery.min.js');
mix.js('resources/js/bootstrap.min.js','public/js/bootstrap.min.js');
mix.js('resources/js/imageUpload.js','public/js/imageUpload.js');
mix.js('resources/js/jquery-3.5.1.min.js','public/js/jquery-3.5.1.min.js');
mix.js('resources/js/modal.js','public/js/modal.js');

