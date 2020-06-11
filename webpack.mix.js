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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.sass('resources/sass/menu.scss', 'public/css');

mix.js('resources/js/fontawesome.js', 'public/js');
mix.js('resources/js/verificar_cedula.js', 'public/js');

mix.browserSync('http://pharmacy.test');

if (mix.inProduction()) {
	mix.version();
}
