<div class="portfolio-filter">
		<strong><?php _e('Filtrar por:', 'apk'); ?></strong>
		<ul>

		<?php if ( is_post_type_archive('proyectos')) { ?>			
			<li class="current-cat">
		<?php  }else{ ?>
			<li>
		<?php } ?>
			
			<a href="<?php echo get_post_type_archive_link('proyectos'); ?>"><?php _e('Todo:', 'apk'); ?></a>
		</li>

			<?php wp_list_categories(array(
				'title_li'   => '',
				'style'      => 'list',
				'show_count' => 0,
				'taxonomy'   => 'servicios'

			)); ?>
			<li class="loading">
				<img src="<?php echo IMAGES; ?>/loading.gif" alt="Loading" />
			</li>
		</ul>
</div><!-- /.portfolio-filter -->