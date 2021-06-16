 const mix = require('laravel-mix');

 /*
  |--------------------------------------------------------------------------
  | Mix Asset Management
  |--------------------------------------------------------------------------
  |
  | Mix provides a clean, fluent API for defining some Webpack build steps
  | for your Laravel applications. By default, we are compiling the CSS
  | file for the application as well as bundling up all the JS files.
  |
  */

 mix.styles([
        'resources/views/site/css/style.css'
     ], 'public/site/css/style.css')

     .scripts([
        'resources/views/site/css/login.css'
     ], 'public/site/css/login.css')

     .scripts([
        'resources/views/site/js/script.js'
     ], 'public/site/js/script.js')

     .scripts([
        'node_modules/jquery/dist/jquery.js'
     ], 'public/site/jquery.js')

     .scripts([
        'node_modules/bootstrap/css/bootstrap.css'
     ], 'public/site/bootstrap.css')

     .scripts([
        'node_modules/bootstrap/dist/js/bootstrap.bundle.js'
     ], 'public/site/bootstrap.js')

     .scripts([
        'resources/views/site/img/udv.png'
     ], 'public/site/img/udv.png')

     .version();
