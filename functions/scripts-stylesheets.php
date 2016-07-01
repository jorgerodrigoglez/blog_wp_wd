<?php
/**
*Hojas de Estilo & Scripts
*
*Incluyendo hojas de estilo y scripts de manera dinámica
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

//STYLE SHEETS
function jrg_theme_styles(){
	//registrando estilos
	wp_register_style( 'normalize', THEMEROOT . '/css/normalize.css' , '' , '3.0.2' , 'all' );
	wp_register_style( 'font-sans', 'http://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,900italic' , '' , '' , 'all' );
	wp_register_style( 'font-serif', 'http://fonts.googleapis.com/css?family=Merriweather:400,400italic,700,700italic' , '' , '' , 'all' );
	wp_register_style( 'font-awesome', THEMEROOT . '/css/font-awesome.min.css' , '' , '3.2.1' , 'all' );
	wp_register_style( 'theme-style',  get_stylesheet_uri(), array('normalize', 'font-sans', 'font-serif', 'font-awesome' ) , '1.0' , 'all' );

	//cargando estilos
	wp_enqueue_style('theme-style');
}

add_action('wp_enqueue_scripts', 'jrg_theme_styles');


//SCRIPTS
function jrg_theme_scripts(){
	//registrando scripts
	wp_register_script( 'fitVids', THEMEROOT . '/js/jquery.fitvids.js' , array('jquery') , '1.0' , true );
	wp_register_script( 'flexslider', THEMEROOT . '/js/jquery.flexslider-min.js' , array('jquery') , '2.0' , true );
	wp_register_script( 'theme-functions', THEMEROOT . '/js/functions.js' , array('jquery', 'fitVids') , '1.0' , true );

	//cargando scripts
	wp_enqueue_script('theme-functions');
}

add_action('wp_enqueue_scripts', 'jrg_theme_scripts');


//COMPATIBILIDAD INTERNET EXPLORER

function jrg_js_conditionals(){
	//condicionales internet explorer
?>	
	<!--[if (gte IE 6)&(lte IE 8)]>
		<script  type="text/javascript" src="js/html5.js"></script>
		<script  type="text/javascript" src="js/selectivizr-min.js"></script>
	<![endif]-->

<?php
}

add_action('wp_enqueue_scripts', 'jrg_js_conditionals');