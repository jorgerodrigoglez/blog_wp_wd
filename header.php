<?php

/**
*Cabecera del tema HEAD & HEADER
*Este archivo carga la cabecera de todas las páginas del Blog
*
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo ('name') ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
			
	<!--PINGBACK-->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<!--SCRIPT COMENTARIOS-->
	<!--pone la caja de comentarios debajo del comentario a responder si dichos comentarios están abiertos-->
	<?php if ( is_single() && comments_open() ){
		wp_enqueue_script('comment-reply');
	}?>

	<!--WP-HEAD-->
	<?php wp_head(); ?>

	<!--THEME CUSTOMIZE /functions/theme-customizer.php-->
	<?php 
		$options = get_theme_mod('jrg_custom_settings');
		$logo    = $options['logo'];		
	?>

</head>

<body <?php body_class(); ?>>

<header id="main-header">

<?php
	//$options = get_theme_mod('jrg_custom_settings');
	//$twitter = $options['twitter'];
	//$facebook = $options['facebook'];
	//$linkedin = $options['linkedin'];
	$github = $options['github'];
	//$google_plus = $options['google_plus'];
	//$pinterest = $options['pinterest'];
	//$instagram = $options['instagram'];

	$copyright = $options['copyright_text'];
?>

		<nav id="main-nav" class="cf">
			
			<!--MENU-->
			<?php wp_nav_menu(array(
				'theme_location' => 'main-menu'

			)); ?>
			
			<a href="#" id="open-search"><i class="icon-search"></i></a>
			
		</nav><!-- /#main-nav -->


		<div id="header-search">
			
			<!--FORMULARIO BÚSQUEDA-->
			<?php get_search_form(); ?>			
			
		</div><!-- /#header-search -->

		<div id="header-logo">
		<!--THEME CUSTOMIZE /functions/theme-customizer.php-->
		<?php if ($logo) { ?>
			<a href="<?php home_url(); ?>"><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>"></a>
		<?php } else { ?>				
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<h2><a href="<?php echo home_url(); ?>"><?php bloginfo('description'); ?></a></h2>
		<?php } ?>

		
		</div><!-- /#header-logo -->
	
		
	</header><!-- /#main-header -->
	
	
	<div id="global-container">