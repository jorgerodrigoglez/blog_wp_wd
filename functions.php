<?php

/**
*Archivo de funciones
*
*Contiene y llama a todas las funciones del tema
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

/**
*Definir constantes
*
*Definir diferentes constantes para usar dentro del tema
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

//Ruta de la carpeta del tema
define('THEMEROOT', get_stylesheet_directory_uri());

//Ruta a la carpeta de imágenes
define('IMAGES', THEMEROOT . '/img');

//Elimina la opción de editar
define('DISALLOW_FILE_EDIT', true);

/**
*Themes Features
*
*Define las características del tema
*Este código ha sido generado desde GenerateWP
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

// Set content width value based on the theme's design

if ( ! isset( $content_width ) )
	$content_width = 1024;

// Register Theme Features
function jrg_custom_theme_features()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'video', 'audio' ) );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );

	// Add theme support for Custom Background
	$background_args = array(
		'default-color'          => 'F3BFEF',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $background_args );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );

	// Add theme support for custom CSS in the TinyMCE visual editor
	add_editor_style( 'editor-style.css' );

	// Add theme support for Translation
	load_theme_textdomain( 'jrg', get_template_directory() . '/languages' );

	// Add images size formats 
	add_image_size('page-head', 1280, 400, true);
	add_image_size('blog-image', 640, 480, true);
}

add_action( 'after_setup_theme', 'jrg_custom_theme_features' );

/**
*Archivos CSS & JavaScripts
*/
require_once('functions/scripts-stylesheets.php');

/**
*MENUS
*/
require_once('functions/menus.php');

/**
*WITGETS
*/
require_once('functions/sidebars.php');

/**
*CUSTOMIZER - OPCIONES DEL TEMA
*/
require_once('functions/theme-customizer.php');

/**
*EDITOR ELEMENTS
*/
require_once('functions/editor-elements.php');

/**
*HOME METABOXES
*/
require_once('functions/home-metaboxes.php');

/**
*PROYECTOS WIDGETS
*/
require_once('functions/proyectos-widget.php');

/**
*CUSTOM LOGIN
*/
require_once('functions/custom-login.php');
