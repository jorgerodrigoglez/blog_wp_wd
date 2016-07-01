<?php

/**
* Template name: Ancho completo (sin sidebar)
*
*
*Página de ancho completo sin Sidebar
*HTML & Layout del page-fullwidth.php
*
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

?>

<!--HEADER-->
<?php get_header(); ?>
		
		
		<section id="main-content-area" class="global-padding cols">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- post -->

			<div id="page-head" class="global-padding">
				
				<h1><?php the_title(); ?></h1>					
		
				<!--Imagen destacada-->
				<?php if ( has_post_thumbnail() ) { ?>

					<?php $imagen_cabecera = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'page-head' ); ?>

					<div class="image-cover" style="background-image: url('<?php echo $imagen_cabecera[0]; ?>');"></div>

				<?php } else { ?>

				<!--THEME CUSTOMIZE /functions/theme-customizer.php-->
					<?php 
						$options = get_theme_mod('jrg_custom_settings');
						$imagen_cabecera = $options['imagen-cabecera'];					

						if ( !$imagen_cabecera) { 
							$imagen_cabecera = IMAGES . '/default-heading-bg.jpg';	
						}
					?>		
				
					<div class="image-cover" style="background-image: url('<?php echo $imagen_cabecera; ?>');"></div>

				<?php } ?>

			<!--fin else-->
			
			</div><!-- /#page-head -->			
			
			
			<div id="main-content" class="full-width">			
			
					
				<article id="post-<?php  the_ID(); ?>" <?php post_class('page'); ?>>
					
					<?php the_content(); ?>		

					

					<?php  
					//Paginación 
						wp_link_pages(array(
							'before'           => '<div class="posts-navigation">' . __( 'Páginas:', 'jrg' ),
							'after'            => '</div>',
							'link_before'      => '',
							'link_after'       => '',
							'next_or_number'   => 'number',
							'separator'        => ' ',
							'nextpagelink'     => __( 'Página siguiente', 'jrg' ),
							'previouspagelink' => __( 'Página previa', 'jrg' ),
							'pagelink'         => '%',
							'echo'             => 1							
							));	?>		
				

				
					<div class="share-post">

						<?php _e('Compartir', 'jrg'); ?>:
						<!-- facebook -->
						<a class="share-facebook" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" target="blank"><span class="facebook-logo"><i class="icon-facebook-sign"></i></span> Facebook</a>
						
						<!-- twitter -->
						<a class="share-twitter" href="http://twitter.com/home?status=<?php echo str_replace(' ', '%20', get_the_title()); ?>%20-%20<?php the_permalink(); ?>" target="blank"> <span class="twitter-logo"><i class="icon-twitter-sign"></i></span> Twitter</a>

						<!-- google plus -->
						<a class="share-google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="blank"><span class="googleplus-logo"><i class="icon-google-plus-sign"></i></span> Google+</a>
					</div><!-- end .share-post -->
				
				</article>	<!-- /.page -->
				

				<!--fin the_loop-->
				<?php endwhile; endif; ?>			
				

				<!--PAGINACIÓN-->	
			
				
				
				<!--COMENTARIOS-->
				<?php comments_template('', true); ?>
			
			
			</div> <!-- end #main-content -->
			
		<!--SIDEBAR-->	
	

			
		</section><!-- end #main-content-area -->

		<!--FOOTER-->		
		<?php get_footer(); ?>