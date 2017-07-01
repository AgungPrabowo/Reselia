const { mix } = require('laravel-mix');

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

mix
	.js([
		'resources/assets/js/app.js',
		'node_modules/jquery/dist/jquery.min.js',
		'node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js'
	], 'js/app.js')
   	.sass('resources/assets/sass/app.scss','css/app.css')
   	.styles('node_modules/font-awesome/css/font-awesome.css', 'css/app.css')
   	.copy('node_modules/font-awesome/fonts', 'public/fonts')
	.copy('node_modules/font-awesome/fonts', 'public/build/fonts')
	.version();
