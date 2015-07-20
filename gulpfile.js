var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	var paths = {
		'jquery': './vendor/bower_components/jquery/dist/',
	    'materialize': './vendor/bower_components/materialize/dist/'
	}

    mix.less('app.less');

    //mix.copy(paths.materialize + 'font/**', 'public/font');

    mix.scripts([
        //paths.jquery + "jquery.js",
        //paths.materialize + "js/materialize.js"
        'app.js'
    ], 'public/js/app.js')
    .scripts(['analytic.js'], 'public/js/analytic.js');
});
