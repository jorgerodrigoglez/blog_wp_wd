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

$twitter = $options['twitter'];
$facebook = $options['facebook'];
$linkedin = $options['linkedin'];
$google_plus = $options['google_plus'];
$pinterest = $options['pinterest'];
$instagram = $options['instagram'];
$github = $options['github'];

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
				<?php if( $instagram ) { ?>
					<a href="<?php echo esc_url( $instagram ); ?>" target="_blank" title="twitter"><i class="icon-instagram"></i></a>
				<?php } ?>

				<?php if( $twitter ) { ?>
					<a href="<?php echo esc_url( $twitter ); ?>" target="_blank" title="twitter"><i class="icon-twitter"></i></a>
				<?php } ?>

				<?php if( $facebook ) { ?>
					<a href="<?php echo esc_url( $facebook ); ?>" target="_blank" title="facebook"><i class="icon-facebook"></i></a>
				<?php } ?>

				<?php if( $linkedin ) { ?>
					<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" title="linkedin"><i class="icon-linkedin"></i></a>
				<?php } ?>

				<?php if( $pinterest ) { ?>
					<a href="<?php echo esc_url( $pinterest ); ?>" target="_blank" title="twitter"><i class="icon-pinterest"></i></a>
				<?php } ?>

				<?php if( $google_plus ) { ?>
					<a href="<?php echo esc_url( $google_plus ); ?>" target="_blank" title="twitter"><i class="icon-google-plus"></i></a>
				<?php } ?>

				<?php if( $github ) { ?>
					<a href="<?php echo esc_url( $github ); ?>" target="_blank" title="github"><i class="icon-github"></i></a>
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