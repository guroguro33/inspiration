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
  .sass('resources/sass/app.scss', 'public/css')
  .browserSync({
    host: 'homestead.inspiration',
    proxy: {
      target: "http://homestead.inspiration",
      ws: true
    },
    browser: "google chrome",
    files: [
      './public/css/app.css',
      './app/**/*',
      './config/**/*',
      './resources/js/**/*',
      './resources/sass/**/*',
      './resources/views/**/*.blade.php',
      './resources/views/*.blade.php',
      './routes/**/*'
    ],
    watchOptions: {
      usePolling: true,
      interval: 3000
    },
    open: "external",
    reloadOnRestart: true
  });
