const mix = require('laravel-mix');

mix
    .sass('resources/scss/app.scss', 'public/css')
    .copy('node_modules/bootstrap-italia/dist/js/bootstrap-italia.bundle.min.js', 'public/js/app.js')
    .copy('node_modules/bootstrap-italia/dist/fonts', 'public/fonts')
    .copy('node_modules/bootstrap-italia/dist/svg', 'public/svg')
;
