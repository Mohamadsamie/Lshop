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

mix.styles([
    'resources/admin/bootstrap/css/bootstrap.css',
    'resources/admin/bootstrap/css/font-awesome.min.css',
    'resources/admin/bootstrap/css/ionicons.min.css',
    'resources/admin/dist/css/AdminLTE.min.css',
    'resources/admin/dist/css/skins/_all-skins.min.css',
    'resources/admin/plugins/iCheck/flat/blue.css',
    'resources/admin/plugins/morris/morris.css',
    'resources/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    'resources/admin/plugins/datepicker/datepicker3.css',
    'resources/admin/plugins/daterangepicker/daterangepicker-bs3.css',
    'resources/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
], 'public/css/admin.css');

mix.scripts([
    'resources/admin/bootstrap/js/html5shiv.min.js',
    'resources/admin/bootstrap/js/respond.min.js',
    'resources/admin/plugins/jQuery/jQuery-2.2.0.min.js',
    'resources/admin/plugins/jquery-ui.min.js',
    'resources/admin/plugins/custom.js',
    'resources/admin/bootstrap/js/bootstrap.min.js',
    'resources/admin/plugins/raphael-min.js',
    'resources/admin/plugins/morris/morris.min.js',
    'resources/admin/plugins/sparkline/jquery.sparkline.min.js',
    'resources/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    'resources/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    'resources/admin/plugins/knob/jquery.knob.js',
    'resources/admin/plugins/moment.min.js',
    'resources/admin/plugins/daterangepicker/daterangepicker.js',
    'resources/admin/plugins/datepicker/bootstrap-datepicker.js',
    'resources/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
    'resources/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
    'resources/admin/plugins/slimScroll/jquery.slimscroll.min.js',
    'resources/admin/plugins/fastclick/fastclick.js',
    'resources/admin/dist/js/app.min.js',
    'resources/admin/dist/js/pages/dashboard.js',
    'resources/admin/dist/js/demo.js',
], 'public/js/admin.js');

mix.styles([
    'resources/admin/backend/css/dropzone.min.css',
], 'public/css/dropzone.css');

mix.scripts([
    'resources/admin/backend/js/dropzone.min.js',
], 'public/js/dropzone.js');

mix.js('resources/js/app.js', 'public/admin/js');
