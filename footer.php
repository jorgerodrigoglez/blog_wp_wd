<?php

/**
*Footer principal
*Este archivo carga el footer de todas las páginas del Blog
*
*@author Jorge Rodrigo González
*@package jorgerodrigoglez
*@since 1.0.0
*
*/

$options = get_theme_mod('jrg_custom_settings');

//$twitter = $options['twitter'];
//$facebook = $options['facebook'];
//$linkedin = $options['linkedin'];
$github = $options['github'];
//$google_plus = $options['google_plus'];
//$pinterest = $options['pinterest'];
//$instagram = $options['instagram'];

$copyright = $options['copyright_text'];

?>

<footer id="main-footer">
					
			<section id="footer-widgets-area" class="global-padding cols">
				
				
				<div class="col3">
		
					<?php if( is_active_sidebar('footer-sidebar-left') ) {

						dynamic_sidebar('footer-sidebar-left');

					} ?>

				</div><!-- /.col3 -->
				
				<div class="col3">
					
					<?php if( is_active_sidebar('footer-sidebar-center') ) {

						dynamic_sidebar('footer-sidebar-center');

					} ?>

					
				</div><!-- /.col3 -->
				
				<div class="col3">
					
					<?php if( is_active_sidebar('footer-sidebar-right') ) {

						dynamic_sidebar('footer-sidebar-right');

					} ?>
					
				</div><!-- /.col3 -->				
				
				
			</section><!-- /#footer-widgets-area -->

		<!--footer social-->
		<div id="footer-bottom-area" class="global-padding cf">	

			<p class="footer-social">
				<?php if( $github ) { ?>
					<a href="<?php echo esc_url( $github ); ?>" title="github"><i class="icon-github"></i></a>
				<?php } ?>
			</p>

		</div><!-- /#social-media -->
			
			<div id="footer-bottom-area" class="global-padding cf">				
				
				<p class="ctr"><?php echo $copyright ; ?></p>
				
			</div><!-- /#footer-bottom-area -->
			
	</footer><!-- /#main-footer -->

	<!--WP-FOOTER-->
	<?php wp_footer(); ?>	

	<!--AJAX template Portfolio-->
	<?php if( is_page_template('template-portfolio.php') )  { ?>

		<script>

			jQuery('document').ready(function($) {

				jrgFilterPortfolio = function(){

						$('.portfolio-filter a, #portfolio-list .post-navigation a').click(function(e){
							e.preventDefault();

							var filterLink = $(this).attr('href');

							$(this)
								.parent()
								.addClass('current-cat')
									.siblings()
									.removeClass('current-cat');

							$('.portfolio-filter .loading' ).animate({opacity: 1}, 200);
							$('#portfolio-list').animate({opacity: 0.3}, 200);

							$('#portfolio-list').load( filterLink + ' #portfolio-list', function () {
								$('.portfolio-filter .loading' ).animate({opacity: 0}, 200);
								$('#portfolio-list').animate({opacity: 1}, 200);
								jrgFilterPortfolio();

							});
						});

					}

				jrgFilterPortfolio();

			});

		</script>

	<?php } ?>


</body>
</html>