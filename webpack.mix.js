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

 // Robust Admin
mix.styles([
   'resources/css/robust-admin/bootstrap-extended.css',
   'resources/css/robust-admin/colors.css',
   'resources/css/robust-admin/components.css',
   'resources/css/components.css',
   'resources/fonts/font-awesome/css/all.css'
], 'public/css/robust-admin.css');
mix.scripts([
   'resources/js/robust-admin/vendors.min.js',
   'resources/js/robust-admin/core/app-menu.js',
   'resources/js/robust-admin/core/app.js'
], 'public/js/robust-admin.js');

// Elements + GCIS
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app--v2.scss', 'public/css')
   .sass('resources/sass/gcis.scss', 'public/css');
   //.svgSprite('resources/icons', 'output/sprite.svg', [loaderOptions], [pluginOptions]);

// Images
mix.copy('resources/icons/favicon.ico', 'public')
   .copy('resources/images', 'public/images')
   .copy('resources/fonts/font-awesome/fonts', 'public/fonts/font-awesome');