const mix = require('laravel-mix');
const CompressionPlugin = require('compression-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const BrotliPlugin = require('brotli-webpack-plugin');
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
    .js('resources/js/home.js', 'public/js')
    .js('resources/js/about.js', 'public/js')
    .js('resources/js/forms.js', 'public/js')
    .js('resources/js/physicsClasses.js', 'public/js')
    .sass('resources/sass/bootstrapAR.scss', 'public/css')
    .sass('resources/sass/splashscreen.scss', 'public/css')
    .sass('resources/sass/about.scss', 'public/css')
    .sass('resources/sass/forms.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/home.scss', 'public/css')
    //Sidebar
    //.copy('node_modules/vue-sidebar-menu/dist/vue-sidebar-menu.css', 'public/css/sidebar.css')
    .sass('resources/sass/sidebar.scss', 'public/css')
    .version();

if (mix.inProduction())
{
    mix.webpackConfig({
        optimization: {
            minimizer: [
                new TerserPlugin({
                    parallel: true,
                    terserOptions: {
                        mangle: true,
                        ecma: 8,
                        output: {
                            comments: false,
                            beautify: false,
                            ecma: 8
                        },
                        compress: true,
                        ie8: true,
                        safari10: true
                    }
                })
            ]
        },
        plugins: [new CompressionPlugin(), new BrotliPlugin()],
        output: {
            publicPath: ""
        }
    });
}

/*
{
    algorithm: 'gzip',
    threshold: 10240,
    minRatio: 0.7
}),
new BrotliPlugin({
    threshold: 10240,
    minRatio: 0.7
})
*/
