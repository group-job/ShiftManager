var elixir = require('laravel-elixir');

// require('laravel-elixir-compass');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

 var paths = {
     'jquery': 'bower_components/jquery/',
     'bootstrap': 'bower_components/bootstrap-sass-official/assets/'
 };

elixir(function(mix) {
    mix.less('app.less');
    mix.sass('app.scss'); // app.scssをコンパイルして、public/css/app.css に出力

       // Bootstrapのフォントを public/fonts/bootstrapディレクトリにコピー
       mix.copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap');

       // jquery.jsと bootstrap.jsを結合して、public/js/app.jsに出力
       mix.scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js"
        ], 'public/js/app.js', './');  // ①
});
