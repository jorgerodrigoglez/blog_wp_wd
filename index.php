	
	<!--HEADER-->
	<?php get_header(); ?>
	
	
	<!--SECTION-->
		
		<section id="main-content-area" class="global-padding cols">
			
			
			<div id="page-head" class="global-padding small-heading">

				<?php if( is_category() ) { ?>
				
					<h1><?php _e('Categoría', 'jrg'); ?>: <?php single_cat_title(); ?></h1>

				<?php } elseif ( is_tag() ) { ?>

					<h1><?php _e('Etiqueta', 'jrg'); ?>: <?php single_tag_title(); ?></h1>

				<?php } elseif ( is_search() ) { ?>

					<h1><?php _e('Resultados para', 'jrg'); ?>: <?php the_search_query(); ?></h1>

				<?php } elseif ( is_day() ) { ?>

					<h1><?php _e('Archivo', 'jrg'); ?>: <?php the_time( get_option('date_format') ); ?></h1>

				<?php } elseif ( is_month() ) { ?>

					<h1><?php _e('Archivo', 'jrg'); ?>: <?php the_time( 'F Y' ); ?></h1>

				<?php } elseif ( is_year() ) { ?>

					<h1><?php _e('Archivo', 'jrg'); ?>: <?php the_time( 'Y' ); ?></h1>

				<?php } elseif ( is_author() ) { ?>

					<h1><?php _e('Artículos por', 'jrg'); ?>: <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo $curauth->display_name ?></h1>
		
				<?php } elseif ( is_404() ) { ?>

					<h1><?php _e('Página no encontrada', 'jrg'); ?></h1>

				<?php } elseif ( is_home() ) { ?>

					<h1><?php _e('Blog', 'jrg'); ?></h1>

				<?php } elseif ( is_tax() ){ ?>

					<?php $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy') ); ?>
					<h1><?php echo $term->taxonomy; ?> : <?php echo $term->name; ?></h1>

				<?php } elseif ( is_post_type_archive() ){ ?>

					<h1><?php post_type_archive_title(); ?></h1>

				<?php } else { ?>

					<h1><?php wp_title(' ', true, 'right'); ?></h1>

				<?php } ?>

				<!--THEME CUSTOMIZE /functions/theme-customizer.php-->
				<?php 
					$options        = get_theme_mod('jrg_custom_settings');
					$imagen_cabecera  = $options['imagen-cabecera'];
				

					//THEME CUSTOMIZE /functions/theme-customizer.php
					if ( !$imagen_cabecera) { 
						$imagen_cabecera = IMAGES . '/default-heading-bg.jpg';	
					}
				?>


			<div class="image-cover" style="background-image: url('<?php echo $imagen_cabecera ; ?>'); "> </div>

			</div><!-- /#page-head -->
			
			<div id="main-content">

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<!-- post -->

						<article <?php post_class('article resume'); ?> id="post-<?php the_ID(); ?>">

						
						<div class="blog-entry-header">
							<small class="entry-date"><?php the_time( get_option('date_format') ); ?></small>
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						</div><!-- /.blog-entry-header -->
						
							<?php 
								if( !has_post_format('video') && !has_post_format('audio') ) {

									if( has_post_thumbnail() ) {

									the_post_thumbnail('blog-image' /*, array(

										'class'  => '';
										'title'  => '';
										'alt'    => '';

									)*/); //thumbnail ; medium ; large ; (array (300 , 300)); 
								}

							} ?>
						
							<?php //the_content(__('Ver más', 'jrg'); ?>
							<?php the_excerpt(); ?>

							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="more-link"><?php __('Ver más', 'jrg'); ?></a>
											
					</article>	<!-- /.resume -->
					<?php endwhile; else:					

						get_template_part('content', 'noposts');

					endif; ?> 

					<!--PAGINACIÓN 1-->

						<?php 
							global $wp_query;

							$big = 999999999; // need an unlikely integer

							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages
							) );
						?>		
							
					<!--PAGINACIÓN 2-->
					<?php /* if( get_next_posts_link() || get_previous_posts_link()) { ?>

							<div class="posts-navigation cf">
								<nav>
									
									<div class="link-container previous fl">									
										<?php next_posts_link(__('&larr; Posts antiguos', 'jrg')); ?>
									</div>
									<div class="link-container next fr">								
										<?php previous_posts_link(__('Posts recientes &rarr;', 'jrg')); ?>
									</div>
									
									
								</nav>
							</div> <!-- /.posts-navigation -->
					
					<?php } */ ?>

			</div> <!-- /#main-content -->

		<!--SIDEBAR-->	
		<?php get_sidebar(); ?>

			
		</section><!-- /#main-content-area -->


		
		
		<!--FOOTER-->
		<?php get_footer(); ?>