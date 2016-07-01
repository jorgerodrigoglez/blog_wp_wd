<?php

/**
*CREAR METABOXES
*
*Con esta función creamos el metabox
*Se incluiran los campos personalizados
*
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

function jrg_home_metabox_add() {
	add_meta_box('home_details', __('Página de inicio', 'jrg'), 'jrg_home_metabox', 'page', 'normal', 'high', '');
}

add_action('add_meta_boxes', 'jrg_home_metabox_add');


//Creamos un listado de los campos
$custom_home_meta_fields = array(

	array(
		'label'  =>  __('Texto destacado','jrg'),
		'desc'   =>  __('Inserta el eslogan para tu sitio','jrg'),
		'id'     => 'slogan',
		'type'   => 'textarea'
		),

	array(
		'label'  =>  __('Texto del botón','jrg'),
		'desc'   =>  __('Inserta un texto para el botón de llamada a la acción','jrg'),
		'id'     => 'btn_text',
		'type'   => 'text'
		),

	array(
		'label'  =>  __('Enlace del botón','jrg'),
		'desc'   =>  __('Inserta el enlace del botón','jrg'),
		'id'     => 'btn_link',
		'type'   => 'url'
		),

	array(
		'label'  =>  __('Título de proyectos recientes','jrg'),
		'desc'   =>  __('Inserta un título que identifique tuls proyectos recientes','jrg'),
		'id'     => 'proyectos_title',
		'type'   => 'text'
		),

	array(
		'label'  =>  __('Proyectos','jrg'),
		'desc'   =>  __('¿Cuántos proyectos quieres mostrar','jrg'),
		'id'     => 'proyectos_count',
		'type'   => 'number'
		),

	);

/**
*CREAR CAMPOS DEL METABOX
*
*Con esta función creamos los diferentes campos que
*se incluiran en el metabox
*
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

function jrg_home_metabox() {

	global $custom_home_meta_fields, $post;

	//Creamos campo oculto (nonce)
	wp_nonce_field('jrg_home_metabox_nonce','meta_box_nonce');

	foreach ( $custom_home_meta_fields as $field ) {
		//Obtener el valor del campo
		$meta = get_post_meta($post->ID, $field['id'], true);
		//Hacemos un switch de acuerdo con el tipo de campo
		switch ( $field['type'] ) {

			case 'text' : { ?>
				<p>	
					<label for="<?php $field['id'] ?>"><?php echo $field['label']; ?></label><br>
					<input id="<?php echo $field['id'] ?>" name="<?php echo $field['id'] ?>" type="text" class="widefat" value="<?php echo $meta; ?>">
					<span class="howto"><?php echo $field['desc']; ?></span>
				</p>

				<hr styles="width: 100%; height: 1px; border: none; border-bottom: 1px solid white; margin: 15px 0; background-color: #dbdcdd";/>
			<?php }
			break;

			case 'textarea' : { ?>
				<p>	
					<label for="<?php echo $field['id'] ?>"><?php echo $field['label']; ?></label><br>					
					<textarea name="<?php echo $field['id'] ?>" id="<?php echo $field['id'] ?>" rows="3" class="widefat"><?php echo $meta; ?></textarea>
					<span class="howto"><?php echo $field['desc']; ?></span>
				</p>

				<hr styles="width: 100%; height: 1px; border: none; border-bottom: 1px solid white; margin: 15px 0; background-color: #dbdcdd";/>
			<?php }
			break;

			case 'url' : { ?>
				<p>	
					<label for="<?php echo $field['id'] ?>"><?php echo $field['label']; ?></label><br>					
					<input id="<?php echo $field['id'] ?>" name="<?php echo $field['id'] ?>" type="text" class="widefat" value="<?php echo esc_url( $meta );?>">
					<span class="howto"><?php echo $field['desc']; ?></span>
				</p>

				<hr styles="width: 100%; height: 1px; border: none; border-bottom: 1px solid white; margin: 15px 0; background-color: #dbdcdd";/>
			<?php }
			break;

			case 'number' : { ?>
				<p>	
					<label for="<?php $field['id'] ?>"><?php echo $field['label']; ?></label><br>
					<input id="<?php $field['id'] ?>" name="<?php echo $field['id'] ?>" type="number" class="widefat" value="<?php echo $meta; ?>">
					<span class="howto"><?php echo $field['desc']; ?></span>
				</p>

				<?php  //<hr styles="width: 100%; height: 1px; border: none; border-bottom: 1px solid white; margin: 15px 0; background-color: #dbdcdd";/>?>
			<?php }
			

		}//switch
	}//foreach
}//function

/**
*GUARDAR CAMPOS
*
*Con esta función guardamos los datos que se hayan
*ingresado en los campos al momento de guardar el proyecto
*
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

function jrg_save_home_custom_meta( $post_id ) {

	global $custom_home_meta_fields;
	//verificación del que nonce haya sido enviado
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'jrg_home_metabox_nonce') ) {
		return;
	}
	//Si esto es un autosave no hacemos nada
	if( defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}
	//Verificando los permisos de usuarios
	if( 'page' == $_POST['post_type'] ) {
		if( !current_user_can('edit_page', $post_id ) ) {
			return;
		} elseif (!current_user_can('edit_post', $post_id ) ) {
			return;
		}
	}

	//hacemos un loop por los campos
	foreach ($custom_home_meta_fields as $field ) {
		//capturamos los datos antiguos
		$old = get_post_meta($post_id, $field['id'], true );
		//capturamos los datos nuevos
		$new = $_POST[ $field['id'] ];

		if ( $new && $new != $old) {

			if ($field['id'] == 'url') {
				//actualizando el post meta
				update_post_meta( $post_id, $field['id'], esc_url( $new ) );
			}else{
				//actualizando el post meta
				update_post_meta( $post_id, $field['id'], $new );
			}
				
		} elseif ('' == $new && $old ) {
			//Borramos el post meta
			delete_post_meta( $post_id, $field['id'], $old );
		}		

	}//foreach

}//function

add_action('save_post', 'jrg_save_home_custom_meta');

/**
*OCULTAR O MOTRAR METABOX
*
*Esta funcion integra css al head del area admin
*que permite ocultar el metabox home
*
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

function jrg_home_metabox_css() { 
?>

	<style type="text/css" media="screen">	

		#home_details {
			display: none;
		}

	</style>

	<script>
		jQuery('document').ready(function($) {
		//Definir la función slider-box
			slider_box = function(){
				if( $('#page_template').attr('value') == 'template-home.php' ) {
					$('#home_details').slideDown();
				}else{
					$('#home_details').hide();
				}
			}

			//ejecutamos una vez el valor slider box
			slider_box();
			//cada vez que cambia el selector de templates se ejecuta de nuevo
			$('#page_template').change(function() {
				slider_box();			
			})

			$('#home_details-hide').parent().remove();
		});

	</script>

<?php
}

add_action('admin_head', 'jrg_home_metabox_css');