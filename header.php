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
	$options = get_theme_mod('jrg_custom_settings');
	$twitter = $options['twitter'];
	$facebook = $options['facebook'];
	$linkedin = $options['linkedin'];
	$github = $options['github'];
	$google_plus = $options['google_plus'];
	$pinterest = $options['pinterest'];
	$instagram = $options['instagram'];

	$copyright = $options['copyright_text'];
?>

	<div id="footer-bottom-area" class="global-padding cf">		

		<p class="footer-social">

				<?php if( $twitter ) { ?>
							<a href="<?php echo esc_url( $twitter ); ?>" title="twitter"><i class="icon-twitter"></i></a>
				<?php } ?>

				<?php if( $facebook ) { ?>
							<a href="<?php echo esc_url( $facebook ); ?>" title="facebook"><i class="icon-facebook-sign"></i></a>
				<?php } ?>
						
				<?php if( $linkedin ) { ?>
							<a href="<?php echo esc_url( $linkedin ); ?>" title="linkedin"><i class="icon-linkedin"></i></a>
				<?php } ?>

				<?php if( $github ) { ?>
							<a href="<?php echo esc_url( $github ); ?>" title="github"><i class="icon-github"></i></a>
				<?php } ?>

				<?php if( $google_plus ) { ?>
							<a href="<?php echo esc_url( $google_plus ); ?>" title="google+"><i class="icon-google-plus-sign"></i></a>
				<?php } ?>

				<?php if( $pinterest ) { ?>	
							<a href="<?php echo esc_url( $pinterest ); ?>" title="pinterest"><i class="icon-pinterest"></i></a>
				<?php } ?>

				<?php if( $instagram ) { ?>
							<a href="<?php echo esc_url( $instagram ); ?>" title="instagram"><i class="icon-instagram"></i></a>
				<?php } ?>

				<!--<?php //if( $stackexchange ) { ?>-->
							<!--<a href="<?php //echo esc_url( $stackexchange ); ?>" title="stackexchange"><i class="icon-stackexchange"></i></a>-->
				<!--<?php //} ?>-->

				<!--<?php //if( $tumblr ) { ?>-->	
							<!--<a href="<?php //echo esc_url( $tumblr ); ?>" title="tumblr"><i class="icon-tumblr-sign"></i></a>-->
				<!--<?php //} ?>-->

				<!--<?php //if( $dribbble ){ ?>-->
							<!--<a href="<?php //echo esc_url( $dribbble ); ?>" title="dribbble"><i class="icon-dribbble"></i></a>-->
				<!--<?php //} ?>-->

				<!--<?php //if( $flickr ) { ?>-->	
							<!--<a href="<?php //echo esc_url( $flickr ); ?>" title="flickr"><i class="icon-flickr"></i></a>-->
				<!--<?php //} ?>-->

				<!--<?php //if( $youtube ) { ?>-->	
							<!--<a href="<?php //echo esc_url( $youtube ); ?>" title="youtube"><i class="icon-youtube"></i></a>-->
				<!--<?php //} ?>-->

				<!--<?php //if( $rss ) { ?>-->
							<!--<a href="<?php //echo esc_url( $rss ); ?>" title="rss"><i class="icon-rss"></i></a>-->
				<!--<?php //} ?>-->

			</p>


		</div><!-- /#social-media -->

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