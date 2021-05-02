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

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.sass('resources/sass/dashboard/index.scss', 'public/css/dashboard/style.css')

    .scripts('resources/js/dashboard/app.js', 'public/js/dashboard/script.js')

    .sass('resources/sass/template/index.scss', 'public/css/template/style.css')
    .scripts('resources/js/template/app.js', 'public/js/template/script.js')
    .scripts('resources/js/template/plugins/projects.js', 'public/js/template/plugins/projects.js')
    
.version();

mix.copyDirectory('resources/images', 'public/images');

// mix.copy('node_modules/bootstrap/dist/js/bootstrap.js', 'public/js/bootstrap.js');
// mix.copy('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/js/bootstrap.bundle.js');
// mix.copy('node_modules/bootstrap/dist/js/bootstrap.js.map', 'public/js/bootstrap.js.map');
// mix.copy('node_modules/bootstrap/dist/js/bootstrap.bundle.js.map', 'public/js/bootstrap.bundle.js.map');
// mix.copy('node_modules/bootstrap-icons/font/bootstrap-icons.css', 'public/css/bootstrap-icons.css');
// mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');