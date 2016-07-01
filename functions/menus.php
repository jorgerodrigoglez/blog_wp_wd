<?php
/**
*MENUS
*
*Incluyendo Menus a la plantilla WP
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/


function jrg_navigations_menu() {

	register_nav_menus( array(
		'main-menu'   => __('Area de menu principal', 'jrg')		

		));
}

add_action('init', 'jrg_navigations_menu');