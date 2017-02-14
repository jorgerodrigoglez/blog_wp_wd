<?php

/**
* Template name: Homepage
*
*Plantilla para la página de inicio
*
*Esta plantilla muestra un texto destacado +
*el contenido de la página + los últimos proyectos
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

		
		<!--the loop-->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<!--Custom fields cabecera-->
		<?php 

			//Con archivo home-metaboxes
			$slogan = get_post_meta( $post->ID, 'slogan', true);
			$btn_text = get_post_meta( $post->ID, 'btn_text', true);	
			$btn_link = get_post_meta( $post->ID, 'btn_link', true);

			$proyectos_title = get_post_meta( $post->ID, 'proyectos_title', true);
			$proyectos_count = get_post_meta( $post->ID, 'proyectos_count', true);

			//Con pluging Custom Field añadir esto:
			//$slogan = get_field('slogan');
			//$btn_text = get_field('btn_text');	
			//$btn_link = get_field('btn_link');
			//$proyectos_title = get_field('proyectos_title');
			//$proyectos_count = get_field('proyectos_count');

			if( $proyectos_count && $proyectos_count < 0){
				$proyectos_count = 0;
			}			

			if (!$slogan) {
				$slogan = get_bloginfo('name');
			}	

			if (!$btn_text) {
				$btn_text = __('Contáctame', 'jrg');
			}

			if (!$proyectos_title) {
				$proyectos_title = __('Mira mis proyectos recientes', 'jrg');
			}

		 ?>		
			
			<div id="home-page-head" class="global-padding">
				
				<h2><?php echo nl2br($slogan); ?></h2>

				<?php  if($btn_link) { ?>				
					<a href="<?php echo esc_url($btn_link); ?>" target="_blank" class="btn btn-big"><?php echo $btn_text; ?></a>
				<?php } ?>

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

			</div><!-- /#home-page-head -->

		
			
			<div id="main-content" class="full-width homepage-content cf"> 
		
				<article class="page">
					
					<?php the_content(); ?>						
										
				</article><!-- /.page -->			

			</div> <!-- /#main-content -->			
			

			<!--fin the_loop-->
			<?php endwhile; endif; ?>	

			<!--Cunstom field proyectos-->
			<?php if( $proyectos_count && $proyectos_count != 0 && post_type_exists('proyectos')) { ?>
			

			<div id="home-recent-projects" class="portfolio-archive global-padding">
				
				<h3><?php echo $proyectos_title; ?></h3>
					
				<div class="cols">

					<?php 

					$query_proyectos = new WP_Query(array(
						'post_type' => 'proyectos',
						'posts_per_page' => $proyectos_count

					));


					if ( $query_proyectos->have_posts() ) : while( $query_proyectos->have_posts() ) : $query_proyectos->the_post(); 				
											
						//content-proyecto-resumen
						get_template_part('content', 'proyecto-resumen');
			

					endwhile; else: 
						
						_e('No hay proyectos disponibles', 'jrg'); 				

					//Fin del Loop
					endif; 
					
					wp_reset_postdata();

					?>			

				</div> <!-- /.cols -->
			
			</div><!-- /#recent-projects -->

		<?php } ?>


		</section><!-- end #main-content-area -->
		
<!--FOOTER-->		
<?php get_footer(); ?>	
		