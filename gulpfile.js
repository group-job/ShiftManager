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
     'fullcalendar' : 'bower_components/fullcalendar/',
     'scheduler' : 'bower_components/fullcalendar-scheduler/',
     'alertify' : 'bower_components/alertify/',
     'moment' : 'bower_components/moment/',
     'tooltipster' : 'bower_components/tooltipster/',
     'js' : 'resources/assets/js/'
 };

elixir(function(mix) {
    mix.less('app.less');
    mix.sass([
      '../../../'+paths.fullcalendar+"dist/fullcalendar.css",
      '../../../'+paths.scheduler+"dist/scheduler.css",
      '../../../'+paths.alertify+"themes/alertify.core.css",
      '../../../'+paths.alertify+"themes/alertify.bootstrap.css",
      '../../../'+paths.tooltipster+"css/tooltipster.css",
      'app.scss',
      'home.scss',
      'group.scss',
      'invite.scss',
      'apply.scss',
      // 'scheduler.css'
    ]); // app.scssをコンパイルして、public/css/app.css に出力
       // Bootstrapのフォントを public/fonts/bootstrapディレクトリにコピー
       mix.copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap');

       // jquery.jsと bootstrap.jsを結合して、public/js/app.jsに出力
       mix.scripts([


            // paths.moment+"src/moment.js",
            "resources/assets/fullcalendar/moment.min.js", //bowerでいれたmoment.jsがなぜかエラーはくので
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js",
            paths.fullcalendar + "dist/fullcalendar.js",
            paths.scheduler + "dist/scheduler.js",
            // paths.js+'scheduler.js',
            paths.alertify + "alertify.js",
            paths.tooltipster+"js/jquery.tooltipster.min.js",
            paths.js+'app.js',
        ], 'public/js/app.js', './');  // ①

        //jsファイルわけ
        mix.scripts([
          'profile.js'
        ],'public/js/profile.js');


        mix.scripts([
          'chat.js'
        ],'public/js/chat.js')
});
