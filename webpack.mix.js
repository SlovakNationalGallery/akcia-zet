const mix = require('laravel-mix');
const tailwindPlugin =  require('tailwindcss')

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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        tailwindPlugin({ config: './tailwind.config.js' }), // Explicit default
        require('autoprefixer'),
    ])
    .postCss('resources/css/admin.css', 'public/css', [
        require('postcss-import'),
        tailwindPlugin({ config: './tailwind-admin.config.js' }),
        require('autoprefixer'),
    ]);

if (mix.inProduction()) {
    mix.version();
}
