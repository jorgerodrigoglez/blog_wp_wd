<?php

/**
*
*Comentarios del sitio
*Funcionalidades para los comentarios del sitio
*
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

?>

<div id="comments">
	
	<?php 
		//Prevenimos que se carge directamente comments PHP
		if ( !empty($_SERVER['SCRIPT_FILENAME']) && basename($_SERVER['SCRIPT_FILENAME']) == 'comments.php') {

			die(__('Sabes que no puedes cargar este archivo', 'apk'));
		}
	?>
	
	<?php

		//Si tiene pasword
		if ( post_password_required() ) { ?>

			<p>
				<?php _e('Este artículo requiere contraseña' , 'jrg'); ?>

			</p>

	<?php } ?>

	<?php 
		//Si hay comentarios
		if ( have_comments() ) { ?>

		<!--para versiones antiguas de WordPress-->
		<a href="#respond"></a>		
		<!--para versiones antiguas de WordPress-->

			<h3 class="comments-title"><?php comments_number(
				__('No hay comentarios aun', 'jrg'), 
				__('Hay 1 comentario', 'jrg'), 
				__('Hay % comentarios', 'jrg') ); 
			?></h3>
	
		<ol id="comments-list">

			<?php wp_list_comments('avatar_size=40'); ?>
			
		</ol><!-- /#comments-list -->

		<?php if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>

			<div class="comments-nav-section clearfix">
				
				<p  class="alignleft"><?php previous_comments_link(__('&larr; Comentarios antiguos', 'jrg')); ?></p>
				<p  class="alignright"><?php next_comments_link(__('Comentarios recientes &rarr;', 'jrg')); ?></p>

				<hr>

			</div>

		<?php } ?>
	
	<?php } elseif ( !comments_open() && !is_page() && post_type_supports( get_post_type(), 'comments' ) ) { ?>   

	   <p><?php _e('Los comentarios están cerrados', 'jrg'); ?></p>

	 <?php } ?>

	 <?php 
	 //Mostrar el formulario de comentarios
	 comment_form();

	 ?>

</div>
