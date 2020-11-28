const mix = require("laravel-mix");

const CompressionPlugin = require("compression-webpack-plugin");

if (mix.inProduction()) {
    mix.webpackConfig({
        plugins: [new CompressionPlugin()]
    });
}
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
mix.js("resources/js/app.js", "public/js")
    .js("resources/js/home.js", "public/js")
    .js("resources/js/about.js", "public/js")
    .js("resources/js/forms.js", "public/js")
    .js("resources/js/physicsClasses.js", "public/js")
    .sass("resources/sass/bootstrapAR.scss", "public/css")
    .sass("resources/sass/splashscreen.scss", "public/css")
    .sass("resources/sass/about.scss", "public/css")
    .sass("resources/sass/forms.scss", "public/css")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/home.scss", "public/css")
    .sass("resources/sass/appointment-entrance-card.scss", "public/css")
    //Sidebar
    //.copy('node_modules/vue-sidebar-menu/dist/vue-sidebar-menu.css', 'public/css/sidebar.css')
    .sass("resources/sass/sidebar.scss", "public/css")
    .copyDirectory("resources/ckeditor", "public/texteditor")
    .copyDirectory(
        "node_modules/@fortawesome/fontawesome-free/webfonts",
        "public/webfonts"
    )
    .version();
