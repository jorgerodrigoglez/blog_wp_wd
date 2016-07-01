<?php
/**
*WITGETS SIDEBAR
*
*Witgets del Sidebar a la plantilla WP
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

?>

<div id="sidebar">	
	
	<?php if( is_active_sidebar('main-sidebar') ) {

		dynamic_sidebar('main-sidebar');

	} else { ?>

		<div class="widget">
			<h3 class="widget-title"><?php _e('Búsqueda' , 'jrg' ); ?></h3>
			<div>
				
				<?php get_search_form(); ?>
				
			</div>
		</div>


	<?php } ?>
				
				
</div><!-- #sidebar -->