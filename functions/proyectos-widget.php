<?php

/**
*AÑADIR WIDGET DE PROYECTOS
*
*Con esta función creamos el widget
*Para mostrar los proyectos
*
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

class jrg_recent_projects_widget extends WP_Widget{
	/**
	*iniciamos EL WIDGET
	*/

	public function __construct(){
		parent::__construct(
			'jrg_recent_projects', //ID base del Widget
			__('Proyectos recientes', 'jrg'), //Título del backend
			array(
				'description'  => __('Muestra los proyectos recientes en un Widget.', 'jrg')

			)

		);
	}

	/**
	*Definimos el HTML del Backend
	*/
	public function form( $instance ){
	//Valores por defecto
		$defaults = array(
			'title' => __('Proyectos recientes:', 'jrg'),
			'projects_to_display' => 4
		);

		$instance = wp_parse_args( $instance, $defaults );

		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Título', 'jrg'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?>">
		</p>	

		<p>
			<label for="<?php echo $this->get_field_id('projects_to_display'); ?>"><?php _e('Cuántos proyectos mostrar', 'jrg'); ?></label>
			<input type="number" id="<?php echo $this->get_field_id('projects_to_display'); ?>" name="<?php echo $this->get_field_name('projects_to_display'); ?>" class="widefat" value="<?php echo esc_attr($instance['projects_to_display']); ?>">
		</p>


		<?php 		

	}
	/**
	*Procesar y guardar la información
	*/
	public function update($new_instance, $old_instance){
		//Seteamos instance con los valores previamente guardados
		$instance = $old_instance;
		//Actualizamos el título
		$instance['title'] = strip_tags($new_instance['title']);
		//Actualizamos proyectos a mostrar
		$instance['projects_to_display'] = $new_instance['projects_to_display'];
		//Devolvemos Instance
		return $instance;

	}

	/**
	*Iniciamos el Widget
	*/
	public function widget($args, $instance){

		$title = apply_filters('widget_title', $instance['title'] );
		$projects_to_display = $instance['projects_to_display'];

		//Flexsliders
		wp_enqueue_script('flexslider');

		function jrg_slider_proyectos_js_footer(){
			?>
			<script>

//---------------------------------------------------------------------
// PORTFOLIO WIDGET
//---------------------------------------------------------------------
			jQuery('document').ready(function($){

				$('.portfolio-recent-projects-widget').flexslider({
					selector: '.projects > li',
					animation: 'fade',
					controlNav: false,
					directionNav: true, 
					pauseOnAction: false,
					pauseOnHover: true,
					prevText: '<i class="icon-chevron-left"></i>',
					nextText: '<i class="icon-chevron-right"></i>'
				});

			});


			</script>

			<?php 
		}
		
		add_action('wp_footer', 'jrg_slider_proyectos_js_footer');


		//-----------------JS END-------------------//

		echo $args['before_widget'];

		if(!empty($title) ){
			echo $args['before_title'] . $title . $args['after_title'];		 
		}

		if( post_type_exists('proyectos') ){ ?>

			<section class="portfolio-recent-projects-widget">
					
				<ul class="projects">

					<?php 

						$query_widget_proyectos = new WP_Query(array(
						'post_type' => 'proyectos',
						'posts_per_page' => $projects_to_display

					));


					if ( $query_widget_proyectos->have_posts() ) : while( $query_widget_proyectos->have_posts() ) : $query_widget_proyectos->the_post(); ?>	

						<?php global $post; ?>						
						
						<li class="">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								
								<?php if ( has_post_thumbnail() ) { ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('blog-image'); ?></a>					
								<?php } ?>

								<div class="text">
									<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></h4>

									<div class="services">
										<?php echo get_the_term_list( $post->ID, 'servicios', '', ', ', '');?>
									</div> 
								</div>
									
							</article>
						</li>	

					<!-- post -->
					<?php endwhile; else:
						
						_e('No hay proyectos definidos','jrg');
				
					//Fin del Loop
					endif; 

					wp_reset_postdata();

					?> 					
												
				</ul>

			</section><!-- /.portfolio-recent-projects-widget -->



		<?php 
		}else{
			_e('Por favor habilita el tipo de contenidos proyectos, activando en pluging: "My Project Post Type", incluido en el tema', 'jrg');
		}

		echo $args['after_widget'];
	}


}


/**
*REGISTRAMOS EL WIDGET
*/

function jrg_register_recent_projects_widget(){

	register_widget( 'jrg_recent_projects_widget' );

}

add_action('widgets_init', 'jrg_register_recent_projects_widget');