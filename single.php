<?php

/**
*Página de detalle Single
*HTML & Layout del single.php
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
				
			
			<div id="page-head" class="global-padding post-head cf">
			
				<div class="post-head-content">
					
					<h1><?php the_title(); ?></h1>
					
					<div id="blog-post-meta">
						
						<div class="author">
							<i class="icon-user"></i><?php _e('Por', 'jrg'); ?> <?php the_author_posts_link(); ?>
						</div>
						
						<div class="date">
							<i class="icon-calendar"></i><?php the_time(get_option('date_format')); ?>
						</div>
						
						<div class="categories">
							<i class="icon-list"></i> <?php the_category(', '); ?>
						</div>

						<?php if ( comments_open() || have_comments() ) { ?>
						
							<div class="comments-counter">
								<i class="icon-comment"></i> <a href="<?php comments_link(); ?>"><?php comments_number(__('Se el primero en comentar', 'jrg'), __('1 Comentario disponible', 'jrg'), __('% Comentarios', 'jrg')); ?></a>
							</div>

						<?php } ?>

						<?php if ( has_tag() ) { ?>

							<div class="tags">
								<i class="icon-tag"></i><?php the_tags('', ' , ' , ''); ?>
							</div>

						<?php } ?>

					</div><!-- /.blog-post-meta -->
					
				</div><!-- /.post-head-content -->

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
			
			
			<div id="main-content" class="">			
			
					
				<article id="post-<?php  the_ID(); ?>" <?php post_class('article'); ?>>
					
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
						
				

				
					<!--<div class="share-post">

						<?php /*_e('Compartir', 'jrg'); */?>:
						<!-- facebook --
						<a class="share-facebook" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" target="blank"><span class="facebook-logo"><i class="icon-facebook-sign"></i></span> Facebook</a>
						
						<!-- twitter --
						<a class="share-twitter" href="http://twitter.com/home?status=<?php //echo str_replace(' ', '%20', get_the_title()); ?>%20-%20<?php the_permalink(); ?>" target="blank"> <span class="twitter-logo"><i class="icon-twitter-sign"></i></span> Twitter</a>

						<!-- google plus --
						<a class="share-google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="blank"><span class="googleplus-logo"><i class="icon-google-plus-sign"></i></span> Google+</a>
					</div><!-- end .share-post -->
				
				</article>	<!-- /.page -->
				

				<!--fin the_loop-->
				<?php endwhile; endif; ?>				
				

				<!--PAGINACIÓN-->			
				<?php if( get_next_post() || get_previous_post()) { ?>

					<div class="posts-navigation">

						<!--<strong class="prev">Post anterior:</strong> <a href="">Nombre del post</a> <br />-->
						<?php next_post_link('<strong class="pre">' . __('Post anterior', 'jrg') . '</strong> %link <br/>', '%title') ?>

						<!--<strong class="next">Post siguiente:</strong> <a href="">Nombre del post</a> <br />-->
						<?php previous_post_link('<strong class="next">' . __('Post siguiente', 'jrg') . '</strong> %link <br/>', '%title') ?>
					</div><!-- /.posts-navigation -->
							
					<?php }  ?>
				
				
				<!--COMENTARIOS-->
				<?php comments_template('', true); ?>
			
			
			</div> <!-- end #main-content -->
			
		<!--SIDEBAR-->	
		<?php get_sidebar(); ?>
			
	</section><!-- end #main-content-area -->		
	
	<!--FOOTER-->		
	<?php get_footer(); ?>