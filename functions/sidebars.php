<?php
/**
*WITGETS
*
*Incluyendo Witgets a la plantilla WP
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

/**
*SIDEBAR PRINCIPAL
*/

function jrg_custom_sidebars () {
	//Sidebar principal
	register_sidebar( array(
		'name'			=> __('Sidebar principal', 'jgr'),
		'id'			=> 'main-sidebar',
		'description'	=> __('Este es el sidebar principal' , 'jrg'),
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title'  => '</h3>'
	));

	//Sidebar footer left
	register_sidebar( array(
		'name'			=> __('Widget footer left', 'jgr'),
		'id'			=> 'footer-sidebar-left',
		'description'	=> __('Witget footer izquierdo' , 'jrg'),
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title'  => '</h3>'

	));

	//Sidebar footer center
	register_sidebar( array(
		'name'			=> __('Widget footer center', 'jgr'),
		'id'			=> 'footer-sidebar-center',
		'description'	=> __('Widget footer central' , 'jrg'),
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title'  => '</h3>'

	));

	//Sidebar footer right
	register_sidebar( array(
		'name'			=> __('Widget footer right', 'jgr'),
		'id'			=> 'footer-sidebar-right',
		'description'	=> __('Widget footer derecha' , 'jrg'),
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title'  => '</h3>'

	));

}

add_action('widgets_init', 'jrg_custom_sidebars');