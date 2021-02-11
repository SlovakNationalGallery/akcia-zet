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

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        tailwindPlugin({ config: './tailwind.config.js' }), // Explicit default
    ])
    .postCss('resources/css/admin.css', 'public/css', [
        tailwindPlugin({ config: './tailwind-admin.config.js' }),
    ])

    // https://spatie.be/docs/laravel-medialibrary/v9/handling-uploads-with-media-library-pro/installation#using-laravel-mix-or-webpack-with-css-loader
    .override((webpackConfig) => {
        webpackConfig.resolve.modules = [
            "node_modules",
            __dirname + "/vendor/spatie/laravel-medialibrary-pro/resources/js",
        ];
    })
    .browserSync('localhost:8000');

if (mix.inProduction()) {
    mix.version();
}
