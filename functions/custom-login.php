<?php
/**
*LOGIN LOGO
*
*Personalización de la pantalla del administrador de WP
*
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

/**
*IMAGEN
*/

function jrg_login_logo(){ 

	$options = get_theme_mod('jrg_custom_settings');
	$login_logo = $options['login-logo'];

	if ( empty($login_logo) ){
		$login_logo = IMAGES. '/foto_fb.png';
	}

	?>
	
	<style type="text/css" media="screen">

	body.login div#login h1 a {
		background-image: url(<?php echo $login_logo; ?>); 
		webkit-background-size: auto;
		moz-background-size: auto;
		background-size: auto;
		width: 100%;
		height: 180px;
	}


	</style>

<?php 

}

add_action('login_enqueue_scripts', 'jrg_login_logo');


/**
*LINK
*/

function jrg_login_link($url){
	return home_url();
}

add_filter('login_headerurl', 'jrg_login_link');

/**
*TITLE
*/

function jrg_login_logo_title($message){
	$message = get_bloginfo('name');
	return $message;
}

add_filter('login_headertitle','jrg_login_logo_title');