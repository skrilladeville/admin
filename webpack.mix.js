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

 // NOTE: wrong paths may not return errors
 // Robust Admin
mix.styles([
   'resources/fonts/font-awesome/css/font-awesome.css',
   'resources/fonts/font-awesome/css/all.css',
   'resources/fonts/feather/style.css',
   // 'app--gccv1/app-assets/css/bootstrap.min.css',
   'resources/css/robust-admin/bootstrap-extended.css',
   'resources/css/robust-admin/colors.css',
   'resources/css/robust-admin/components.css',
   //'resources/css/components.css',
   'app--gccv1/app-assets/css/plugins/ui/jqueryui.css',
   'app--gccv1/app-assets/vendors/css/extensions/pace.css',
   'app--gccv1/assets/datatables-editor/css/jquery.dataTables.min.css',
   'app--gccv1/assets/datatables-editor/css/buttons.dataTables.min.css',
   'app--gccv1/assets/datatables-editor/css/select.dataTables.min.css',
   'app--gccv1/assets/datatables-editor/css/editor.dataTables.min.css'
], 'public/css/robust-admin.css')
   .styles([
   'node_modules/jqwidgets-scripts/jqwidgets/styles/jqx.base.css'
], 'public/css/jqwidgets/jqx.base.css');
mix.scripts([
   'resources/js/robust-admin/vendors.min.js',
   'resources/js/robust-admin/core/app-menu.js',
   'app--gccv1/assets/datatables-editor/js/jquery.dataTables.min.js',
   'app--gccv1/assets/datatables-editor/js/dataTables.buttons.min.js',
   'app--gccv1/assets/datatables-editor/js/dataTables.select.min.js',
   'app--gccv1/assets/datatables-editor/js-lib/jszip.min.js',
   'app--gccv1/assets/datatables-editor/js-lib/pdfmake.min.js',
   'app--gccv1/assets/datatables-editor/js-lib/vfs_fonts.js',
   'app--gccv1/assets/datatables-editor/js/buttons.html5.min.js',
   'app--gccv1/assets/datatables-editor/js/buttons.print.min.js',
   'app--gccv1/assets/datatables-editor/js/dataTables.editor.min.js'
], 'public/js/robust-admin.js');

// Elements + GCIS
mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/robust-admin/robust-admin-init.js', 'public/js')
   .sass('resources/sass/app--v2.scss', 'public/css')
   .sass('resources/sass/gcis.scss', 'public/css');
   //.svgSprite('resources/icons', 'output/sprite.svg', [loaderOptions], [pluginOptions]);

// Images + Fonts
mix.copy('resources/icons/favicon.ico', 'public')
   .copy('app--gccv1/assets/images', 'public/images/gccv1')
   .copy('resources/fonts/font-awesome/fonts', 'public/fonts/font-awesome')
   .copy('resources/fonts/feather/fonts', 'public/fonts/feather');