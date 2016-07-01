<?php

/**
*Opciones del tema WP 
*Customizer 
*
*Modifica el formulario por defecto de WordPress
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

//------------------------------------------------
//CREAMOS EL CONTROLADOR TEXTAREA
//-----------------------------------------------

function jrg_customize_register($wp_customize){
	class JRG_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
		public function render_content() {
		?>
			<label for="">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea <?php $this->link(); ?> rows="5" style="width : 100%; "><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
		<?php
		}
	}//CLASS

//------------------------------------------------
//CABECERA
//-----------------------------------------------

	//CABECERA
	$wp_customize->add_section('jrg_header', array(
		'title'       => __('Cabecera', 'jrg'),
		'description' => __('Opciones de cabecera', 'jrg'),
		'priority'    => 35

	));

	//LOGO
	$wp_customize->add_setting('jrg_custom_settings[logo]', array (
		'default'   => '',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'logo', array(
		'label'    => __('Subir logo', 'jrg'),
		'section'  => 'jrg_header',
		'settings' => 'jrg_custom_settings[logo]',


	)));

	//IMAGEN CABECERA
	$wp_customize->add_setting('jrg_custom_settings[imagen-cabecera]', array (
		'default'   => '',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'imagen-cabecera', array(
		'label'    => __('Subir imagen de cabecera', 'jrg'),
		'section'  => 'jrg_header',
		'settings' => 'jrg_custom_settings[imagen-cabecera]',


	)));

//------------------------------------------------
//SOCIAL LINKS
//-----------------------------------------------	

	$wp_customize->add_section('jrg_social_links', array(
		'title'       => __('Enlaces a las redes sociales', 'jrg'),
		'description' => __('Enlaces a diferentes redes sociales', 'jrg'),
		'priority'    => 36

	));

	//Twitter
	$wp_customize->add_setting('jrg_custom_settings[twitter]', array(
		'default'   => '',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control( 'jrg_custom_settings[twitter]', array(
		'label'    => 'Twitter',
		'section'  => 'jrg_social_links',
		'settings' => 'jrg_custom_settings[twitter]'

	));

	//Facebook
	$wp_customize->add_setting('jrg_custom_settings[facebook]', array(
		'default'   => '',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control( 'jrg_custom_settings[facebook]', array(
		'label'    => 'Facebook',
		'section'  => 'jrg_social_links',
		'settings' => 'jrg_custom_settings[facebook]'

	));

	//Linkedin
	$wp_customize->add_setting('jrg_custom_settings[linkedin]', array(
		'default'   => '',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control( 'jrg_custom_settings[linkedin]', array(
		'label'    => 'Linkedin',
		'section'  => 'jrg_social_links',
		'settings' => 'jrg_custom_settings[linkedin]'

	));

	//Github
	$wp_customize->add_setting('jrg_custom_settings[github]', array(
		'default'   => '',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control( 'jrg_custom_settings[github]', array(
		'label'    => 'Github',
		'section'  => 'jrg_social_links',
		'settings' => 'jrg_custom_settings[github]'

	));

	//Google+
	$wp_customize->add_setting('jrg_custom_settings[google_plus]', array(
		'default'   => '',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control( 'jrg_custom_settings[google_plus]', array(
		'label'    => 'Google+',
		'section'  => 'jrg_social_links',
		'settings' => 'jrg_custom_settings[google_plus]'

	));

	//Pinterest
	$wp_customize->add_setting('jrg_custom_settings[pinterest]', array(
		'default'   => '',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control( 'jrg_custom_settings[pinterest]', array(
		'label'    => 'Pinterest',
		'section'  => 'jrg_social_links',
		'settings' => 'jrg_custom_settings[pinterest]'

	));

	//Instagram
	$wp_customize->add_setting('jrg_custom_settings[instagram]', array(
		'default'   => '',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control( 'jrg_custom_settings[instagram]', array(
		'label'    => 'Instagram',
		'section'  => 'jrg_social_links',
		'settings' => 'jrg_custom_settings[instagram]'

	));

//------------------------------------------------
//OPCIONES DEL PIE DE PÁGINA
//-----------------------------------------------	

	$wp_customize->add_section('jrg_footer', array(
		'title'       => __('Pie de página', 'jrg'),
		'description' => __('Opciones de pie de página', 'jrg'),
		'priority'    => 36

	));

	//Texto de copyright
	$wp_customize->add_setting('jrg_custom_settings[copyright_text]', array(
		'default'   => date('Y') . ' &copy;' . get_bloginfo('name') . ' Diseño: <a href="#">JRG</a>',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control( 'jrg_custom_settings[copyright_text]', array(
		'label'    => 'Texto del pie de página',
		'section'  => 'jrg_footer',
		'settings' => 'jrg_custom_settings[copyright_text]'

	));

//------------------------------------------------
//MISCELANEUS THEME
//-----------------------------------------------	

	$wp_customize->add_section('jrg_micelaneus', array(
		'title'       => __('Personalizado del tema', 'jrg'),
		'description' => __('Opciones misceláneas', 'jrg'),
		'priority'    => 38

	));

	//LOGING LOGO
	$wp_customize->add_setting('jrg_custom_settings[login-logo]', array (
		'default'   => IMAGES. '/foto_fb.png',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'login-logo', array(
		'label'    => __('Subir logo para pantalla de ingreso', 'jrg'),
		'section'  => 'jrg_micelaneus',
		'settings' => 'jrg_custom_settings[login-logo]'

	)));

	//Personalizador de CSS
	$wp_customize->add_setting('jrg_custom_settings[custom_css]', array(
		'default'   => '',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control( new JRG_Customize_Textarea_Control( $wp_customize, 'jrg_custom_settings[custom_css]', array(
		'label'    => 'CSS personalizado',
		'section'  => 'jrg_micelaneus',
		'settings' => 'jrg_custom_settings[custom_css]'
	)));

//------------------------------------------------
//COLOR
//-----------------------------------------------	
	//Color del fondo y color destacado del tema
	$wp_customize->add_setting('jrg_custom_settings[color_link]', array(
		'default'   => '#c4331c',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jrg_custom_settings[color_link]', array(
		'label'    => 'Color destacado',
		'section'  => 'colors',
		'settings' => 'jrg_custom_settings[color_link]'
	)));


	//Color oscuro
	$wp_customize->add_setting('jrg_custom_settings[color_dark]', array(
		'default'   => '#000000',
		'type'      => 'theme_mod'	

	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jrg_custom_settings[color_dark]', array(
		'label'    => 'Color oscuro',
		'section'  => 'colors',
		'settings' => 'jrg_custom_settings[color_dark]'
	)));
}

add_action('customize_register', 'jrg_customize_register');

//Personalización de color destacado, de fondo y oscuro del personalizador de temas

function jrg_customize_css() {
	$options = get_theme_mod('jrg_custom_settings');
	//MISCELANEUS THEME BY THEME CUSTOMIZER
	$custom_css = $options['custom_css'];
	?>
		<style type="text/css">
			a,
			#header-logo a:hover,
			#main-content .article ul li::before,
			#main-content .article .share-post a:hover,
			#comments h3,
			#main-content .portfolio-filter li a:hover,
			#main-content .portfolio-filter li.current-cat,
			#main-content .portfolio-filter li.current-cat a,
			#main-content .article.type-portfolio .project-details h3,
			.widget ul li::before,
			#footer-widgets-area .widget_twitter a,
			#footer-widgets-area .widget_text a,
			#footer-bottom-area .footer-social a:hover{
				color: <?php echo $options['color_link']; ?>;
			}
 
			#main-nav ul li a:hover,
			#main-nav ul li > ul li a:hover,
			#main-nav ul li > ul li.current > a,
			#main-nav ul li > ul li.current-menu-item > a,
			#main-nav ul li > ul li.current-page-item > a,
			#main-nav #open-search:hover,
			#main-nav #open-search.open,
			#page-head,
			#home-page-head,
			#comments #comments-list .reply a:hover,
			.portfolio-archive .portfolio-item-resume,
			.widget_apk_recent_projects article,
			.widget_apk_recent_projects .flex-riection-nav li.flex-prev:hover,
			.widget_apk_recent_projects .flex-riection-nav li.flex-next:hover,
			input[type="submit"],
			input[type="button"],
			a.btn{
				background-color: <?php echo $options['color_link']; ?>;
			}
 
			#header-search,
			#main-content .blog-entry-header,
			input:focus,
			textarea:focus,
			input[type="submit"],
			input[tye="button"],
			a.btn{
				border-color: <?php echo $options['color_link']; ?>;;
			}
	 
			#header-logo a{
				color: <?php echo $options['color_dark']; ?>;
			}
	 
			#main-nav,
			#header-search,
			#main-footer{
				background-color: <?php echo $options['color_dark']; ?>; 
			}
			
			/*comprobar si existe la variable custom_css*/
			<?php if(!empty( $custom_css ) ) { 					
					echo $custom_css ;	
				}			
			?>

		</style>

	<?php 
}

add_action('wp_head', 'jrg_customize_css');

