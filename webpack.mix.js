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

mix.copyDirectory('node_modules/admin-lte/bower_components', 'public/adminlte/bower_components');
mix.copyDirectory('node_modules/admin-lte/dist', 'public/adminlte/dist');
mix.copyDirectory('node_modules/admin-lte/plugins', 'public/adminlte/plugins');

const bower = 'public/adminlte/bower_components';
const dist = 'public/adminlte/dist';

mix.scripts([
   `${bower}/jquery/dist/jquery.min.js`,
   `${bower}/bootstrap/dist/js/bootstrap.min.js`,
   `${bower}/jquery-slimscroll/jquery.slimscroll.min.js`,
   `${bower}/fastclick/lib/fastclick.js`,
   `${dist}/js/adminlte.min.js`,
   `${dist}/js/demo.js`,
], 'public/js/adminlte-default.js');

mix.styles([
   `${bower}/bootstrap/dist/css/bootstrap.min.css`,
   // `${bower}/font-awesome/css/font-awesome.min.css`,
   `${bower}/Ionicons/css/ionicons.min.css`,
   `${dist}/css/AdminLTE.min.css`,
   `${dist}/css/skins/_all-skins.min.css`
], 'public/css/adminlte-default.css');