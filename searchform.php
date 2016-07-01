<?php

/**
*Formulario de Búsqueda
*
*Modifica el formulario por defecto de WordPress
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/
?>


<form method="get" class="search-form" action="<?php echo home_url(); ?>" > 
		<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
		<input type="submit" value="<?php _e('Buscar', 'jrg'); ?>" />
</form>

