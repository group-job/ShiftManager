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
     'bootstrap': 'bower_components/bootstrap-sass-official/assets/',
     'fullcalendar' : 'resources/assets/fullcalendar/',
     'js' : 'resources/assets/js/'
 };

elixir(function(mix) {
    mix.less('app.less');
    mix.sass([
      "fullcalendar.scss",
      // "fullcalendar.print.scss",
      'app.scss',
      'home.scss',
      'invite.scss',
      'apply.scss'
    ]); // app.scssをコンパイルして、public/css/app.css に出力

       // Bootstrapのフォントを public/fonts/bootstrapディレクトリにコピー
       mix.copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap');

       // jquery.jsと bootstrap.jsを結合して、public/js/app.jsに出力
       mix.scripts([
            paths.fullcalendar+"moment.min.js",
            paths.jquery + "dist/jquery.js",
            // paths.fullcalendar+"jquery-ui.custom.min.js",
            paths.js+'app.js',
            paths.fullcalendar + "fullcalendar.js",
            paths.bootstrap + "javascripts/bootstrap.js"
        ], 'public/js/app.js', './');  // ①

        //jsファイルわけ
        mix.scripts([
          'profile.js'
        ],'public/js/profile.js')
});
