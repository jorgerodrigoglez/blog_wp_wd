<?php

/**
* Template name: Portfolio
*
*Página del portfolio
*
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/
?>

<?php get_header(); ?>
		
		
		<section id="main-content-area" class="global-padding cols">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>			
						
			<div id="page-head" class="global-padding">
				
				<h1><?php the_title(); ?></h1>					
		
				<!--Imagen destacada-->
				<?php if ( has_post_thumbnail() ) { ?>

					<?php $imagen_cabecera = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'page-head' ); ?>

					<div class="image-cover" style="background-image: url('<?php echo $imagen_cabecera[0]; ?>');"></div>

				<?php } ?>

				<!--THEME CUSTOMIZE /functions/theme-customizer.php-->
					<?php 
						$options = get_theme_mod('jrg_custom_settings');
						$imagen_cabecera = $options['imagen-cabecera'];					

						if ( !$imagen_cabecera) { 
							$imagen_cabecera = IMAGES . '/default-heading-bg.jpg';	
						}
					?>		
				
					<div class="image-cover" style="background-image: url('<?php echo $imagen_cabecera; ?>');"></div>

				

				<!--THEME CUSTOMIZE /functions/theme-customizer.php-->
					<?php 
						$options = get_theme_mod('jrg_custom_settings');
						$imagen_cabecera = $options['imagen-cabecera'];					

						if ( !$imagen_cabecera) { 
							$imagen_cabecera = IMAGES . '/default-heading-bg.jpg';	
						}
					?>		
				
					<div class="image-cover" style="background-image: url('<?php echo $imagen_cabecera; ?>');"></div>
			

			<!--fin else-->
			
			</div><!-- /#page-head -->		
			
			<div id="main-content" class="full-width portfolio-archive">
			
				<article class="page">	

				<?php the_content(); ?>

				<!--fin del Loop-->
				<?php endwhile; endif;?>	
						
				
				<?php get_template_part('content', 'proyectos-filter'); ?>	
					
					<div id="portfolio-list">
						
						<div class="cols">
						
						<?php 
							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;	
							$proyectos = new WP_Query(array(
								'post_type' => 'proyectos',
								'paged'     => $paged,
								'posts_per_page' => 6
							))

						 ?>
						<?php if ( $proyectos->have_posts() ) : while ( $proyectos->have_posts() ) : $proyectos->the_post(); 
				
							get_template_part('content', 'proyecto-resumen'); 
		
						//Fin del loop
						endwhile; else: 	
							
							get_template_part('content', 'noposts'); 

						endif; 

						wp_reset_postdata(); ?>

						
						</div> <!-- /.cols -->
					
					</div><!-- /#portfolio-list -->

					<!--PAGINACIÓN 1-->

						<?php /*
							global $wp_query;

							$big = 999999999; // need an unlikely integer

							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages
							) ); */
						?>	

					<!--Paginación-->
					<?php if( get_next_posts_link( '', $proyectos->max_num_pages ) || get_previous_posts_link( '', $proyectos->max_nun_pages )) { ?>

							<div class="posts-navigation cf">
								<nav>
									
									<div class="link-container previous fl">									
										<?php next_posts_link(__('&larr; Proyectos anteriores', 'jrg'), $proyectos->max_num_pages); ?>
									</div>
									<div class="link-container next fr">								
										<?php previous_posts_link(__('Proyectos siguientes &rarr;', 'jrg'), $proyectos->max_num_pages); ?>
									</div>
									
									
								</nav>
							</div> <!-- /.posts-navigation -->
					
					<?php }  ?>
										
				</article>	<!-- /.page -->
			
			</div> <!-- end #main-content -->
			

		</section><!-- end #main-content-area -->
		
	<!--FOOTER-->		
	<?php get_footer(); ?>
