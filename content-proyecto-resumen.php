
<article class="portfolio-item-resume col3" data-link="<?php the_permalink(); ?>">
								
	<div class="text">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
		<div class="services">
			<?php echo get_the_term_list( $post->ID, 'servicios', '', ', ', '');?>
		</div> 
	</div>
								
	<a href="<?php the_permalink(); ?>">
		<?php if (has_post_thumbnail() ){
			the_post_thumbnail('blog-image');
		}?>
	</a>
													
</article>	<!-- /.col3 -->					
		