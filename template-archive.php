<?php

/**
*
*Template name: Archivos (full-width)
*
*
*Página de Archivos 
*HTML & Layout de  page-archive.php
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
							'previouspagelink' => __( 'Página anterior', 'jrg' ),
							'pagelink'         => '%',
							'echo'             => 1							
							));	?>		
				
					
					<div class="cols">
						<div class="col3">
							<div class="archive-block">
								<h3><?php _e('Archivos por año', 'jrg'); ?></h3>
								<ul>
									<?php wp_get_archives( array('type' => 'yearly') ); ?>
								</ul>
							</div>
							
							<div class="archive-block">
								<h3><?php _e('Archivos por mes', 'jrg'); ?></h3>
								<ul>
									<?php wp_get_archives( array('type' => 'monthly') ); ?>
								</ul>
							</div>
							
						</div>
						<div class="col3">
							<div class="archive-block">
								<h3><?php _e('Últimos 10 Posts', 'jrg'); ?></h3>
								<ul>
									<?php 
										$recent_posts = wp_get_recent_posts(array('numberposts' => 10) );
										foreach( $recent_posts as $recent ) { ?>
											<li>
												<a href="<?php echo get_permalink( $recent['ID']); ?>" title="<?php echo esc_attr( $recent['post_title'] ); ?>">
													<?php echo $recent['post_title']; ?></a>
											</li>

										<?php } 
									?>
								</ul>

							</div>
							
							<div class="archive-block">
								<h3><?php _e('Archivo por Autor', 'jrg'); ?></h3>
								<ul>
									<?php wp_list_authors(); ?>
								</ul>

							</div>
						</div>
						<div class="col3">
							<div class="archive-block">
								<h3><?php _e('Archivo por día', 'jrg'); ?></h3>
								<ul>
									<?php wp_get_archives( array('type' => 'daily') ); ?>
								</ul>

							</div>
							
							<div class="archive-block">
								<h3><?php _e('Archivo por categoría', 'jrg'); ?></h3>
								<ul>
									<?php wp_list_categories('title_li='); ?>
								</ul>

							</div>
						</div>
					</div>
				
							
				</article>	<!-- /.page -->
				

				<!--fin the_loop-->
				<?php endwhile; endif; ?>			
				

				<!--PAGINACIÓN-->	
			
				
				
				<!--COMENTARIOS-->
				
			
			
			</div> <!-- end #main-content -->
			
		<!--SIDEBAR-->	
	

			
		</section><!-- end #main-content-area -->

		<!--FOOTER-->		
		<?php get_footer(); ?>