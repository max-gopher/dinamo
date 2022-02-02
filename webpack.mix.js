const mix = require('laravel-mix');
const path = require('path');
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

mix.webpackConfig({
    // rules: {
    //     test: /\.(png|jpe?g|gif)$/i,
    //     use: [
    //         {
    //             loader: 'file-loader',
    //             options: {
    //                 esModule: false,
    //             },
    //         },
    //     ],
    // },
    resolve: {
        modules: [
            'node_modules'
        ],
        alias: {
            '@' : path.resolve(__dirname, 'resources/')
        }
    },
});

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [])
    .copy('resources/assets/img', 'public/images', [])
    .vue();
