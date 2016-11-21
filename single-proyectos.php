<?php get_header(); ?>
	
	
	<div id="global-container">
		
		
		<section id="main-content-area" class="global-padding cols">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
			
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

			</div><!-- /#page-head -->
			
			<div id="main-content" class="full-width">
			
				<article class="article type-proyectos">
					
					<?php 
						$multimedia = get_post_meta($post->ID, 'multimedia', true);
						$cliente = get_post_meta($post->ID, 'cliente', true);
						$fecha = get_post_meta($post->ID, 'fecha', true);
						$website = get_post_meta($post->ID, 'website', true);
						$btn_text = get_post_meta($post->ID, 'btn_text', true);
						$btn_link = get_post_meta($post->ID, 'btn_link', true);
						$servicios = get_the_term_list($post->ID, 'servicios', '', ',', '');

						if (!$btn_text){
							$btn_text = __('Contáctame &rarr;', 'jrg');
						}


					?>

					<div class="cols">
						
						
						<div class="col3x2">
								
							<div class="project-images">
								
							<?php echo apply_filters ('the_content', $multimedia); ?>

								
							</div> <!-- /.project-images -->
							
						</div><!-- /.col3x2 -->
						
						
						<div class="col3">

						<?php the_content(); ?>	

						<?php if( $cliente || $fecha || $website || $servicios ) { ?>						
							
								<div class="project-details">
								
									<h3><?php _e('Detalles del proyecto','jrg'); ?></h3>

									<?php if($cliente) { ?>
									
										<p class="client">
											<strong><?php _e('Cliente:','jrg'); ?></strong> <?php echo $cliente; ?>
										</p>

									<?php } ?>

									<?php if($fecha) { ?>

										<p class="date">
											<strong><?php _e('Fecha:','jrg'); ?></strong>  <?php echo $fecha; ?>
										</p>

									<?php } ?>
										
										<p class="services">
											<strong><?php _e('Servicios:','jrg'); ?></strong> <?php echo $servicios; ?>
										</p>

									<?php if($website) { ?>

										<p class="website">
											<strong><a href="<?php echo esc_url($website) ?>"><?php _e('Visitar sitio web &rarr;','jrg'); ?></a></strong> 
										</p>

									<?php } ?>
									
								</div><!-- /.project-details -->
						
						<!--Fin condición-->						
						<?php } ?>

								<?php if($btn_link) { ?>
								
									<a href="<?php esc_url($btn_link); ?>" class="btn"><?php echo $btn_text; ?></a>

								<?php } ?>					

										
		
						<!--PAGINACIÓN-->			
						<?php if( get_next_post() || get_previous_post()) { ?>

							<div class="posts-navigation">

								<!--<strong class="prev">Post anterior:</strong> <a href="">Nombre del post</a> <br />-->
								<?php next_post_link('<strong class="pre">' . __('Proyecto anterior', 'jrg') . '</strong> %link <br/>', '%title') ?>

								<!--<strong class="next">Post siguiente:</strong> <a href="">Nombre del post</a> <br />-->
								<?php previous_post_link('<strong class="next">' . __('Proyecto siguiente', 'jrg') . '</strong> %link <br/>', '%title') ?>
							</div><!-- /.posts-navigation -->
									
						<?php }  ?>
							
						<!--<div class="share-post">

							<?php /*_e('Compartir', 'jrg'); */?>:
							<!-- facebook --
							<a class="share-facebook" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" target="blank"><span class="facebook-logo"><i class="icon-facebook-sign"></i></span> Facebook</a>
							
							<!-- twitter --
							<a class="share-twitter" href="http://twitter.com/home?status=<?php echo str_replace(' ', '%20', get_the_title()); ?>%20-%20<?php the_permalink(); ?>" target="blank"> <span class="twitter-logo"><i class="icon-twitter-sign"></i></span> Twitter</a>

							<!-- google plus --
							<a class="share-google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="blank"><span class="googleplus-logo"><i class="icon-google-plus-sign"></i></span> Google+</a>
						</div><!-- end .share-post -->
						
						</div><!-- /.col3 -->
						
					</div><!-- /.cols -->
															
				</article>	<!-- /.article -->
			
			</div> <!-- end #main-content -->
			
			<!--FIN DEL LOOP-->
			<?php endwhile; endif;?>

		<!--FOOTER-->		
		<?php get_footer(); ?>
		
		</section><!-- end #main-content-area -->
		
		