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

mix.js('resources/js/app.js', 'public/js');
mix.sass('resources/sass/style.scss', 'public/css');
mix.sass('resources/sass/global.scss', 'public/css');
mix.sass('resources/sass/home-page.scss', 'public/css');
mix.sass('resources/sass/common.scss', 'public/css');
mix.sass('resources/sass/header.scss', 'public/css');
mix.sass('resources/sass/footer.scss', 'public/css');
mix.sass('resources/sass/product-detail.scss', 'public/css');
mix.sass('resources/sass/product-category.scss', 'public/css');
mix.sass('resources/sass/search-page.scss', 'public/css');
if (mix.inProduction()) {
    mix.version();
}

