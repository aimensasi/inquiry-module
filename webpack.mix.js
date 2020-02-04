const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');
require('laravel-mix-alias');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/app.js', 'js/inquiry.js')
    .sass( __dirname + '/Resources/assets/sass/app.scss', 'css/inquiry.css');

if (mix.inProduction()) {
    mix.version();
}
