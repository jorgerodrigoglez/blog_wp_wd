<?php

/**
*EDITOR ELEMENTS
*Agregamos el elemento Intro para estilizar los Post
*
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/



function jrg_mce_editor_buttons( $buttons) {
	//habilita botón formato en el editor
	array_unshift( $buttons , 'styleselect');
	return $buttons;
}

add_filter('mce_buttons_2', 'jrg_mce_editor_buttons');



function jrg_mce_before_init ( $settings ){

	$style_formats = array(
		array(
			'title'    => 'Intro del artículo',
			'block'    => 'div',
			'classes'  => 'article-intro',
			'wrapper'  => true

			)

		);

	$settings['style_formats'] = json_encode( $style_formats );
	return $settings;

}

add_filter('tiny_mce_before_init', 'jrg_mce_before_init');


?>