const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .scripts([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/jquery.scrollbar/jquery.scrollbar.js',
        'node_modules/jquery-scroll-lock/dist/jquery-crossLock.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.js',
        'node_modules/js-cookie/src/js.cookie.js',
        'resources/js/admin/admin.js',
    ], 'public/js/admin.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin/admin.scss', 'public/css');
