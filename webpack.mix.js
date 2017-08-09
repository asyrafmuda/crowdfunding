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


// mix.styles('resources/assets/vendor/font-awesome/css/font-awesome.css', 'public/css/font-awesome.css')
//     .copyDirectory('resources/assets/vendor/font-awesome/fonts', 'public/fonts');
//
// // Inspinia vendor
// mix.less('resources/assets/vendor/inspinia/less/style.less', 'public/css')
//     .copyDirectory('resources/assets/vendor/inspinia/img/', 'public/img')
//
//     // JS plugins
//     .js('resources/assets/vendor/inspinia/js/slimscroll/jquery.slimscroll.js', 'public/js')
//     .js('resources/assets/vendor/inspinia/js/wow/wow.min.js', 'public/js')
//
//     // CSS Pugins
//     .styles('resources/assets/vendor/inspinia/css/animate.css', 'public/css/animate.css');


mix.sass('resources/assets/sass/custom.scss', 'public/css');

