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
//$github = $options['github'];
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
		<!--<div id="footer-bottom-area" class="global-padding cf">-->

		<!--<p class="footer-social">-->

				<!--<?php //if( $twitter ) { ?>-->
							<!--<a href="<?php //echo esc_url( $twitter ); ?>" title="twitter"><i class="icon-twitter"></i></a>-->
				<!--<?php } ?>-->

				<!--<?php //if( $facebook ) { ?>-->
							<!--<a href="<?php //echo esc_url( $facebook ); ?>" title="facebook"><i class="icon-facebook-sign"></i></a>-->
				<!--<?php } ?>-->
						
				<!--<?php //if( $linkedin ) { ?>-->
							<!--<a href="<?php //echo esc_url( $linkedin ); ?>" title="linkedin"><i class="icon-linkedin"></i></a>-->
				<!--<?php } ?>-->

				<!--<?php //if( $github ) { ?>-->
							<!--<a href="<?php //echo esc_url( $github ); ?>" title="github"><i class="icon-github"></i></a>-->
				<!--<?php } ?>-->

				<!--<?php //if( $google_plus ) { ?>-->
							<!--<a href="<?php //echo esc_url( $google_plus ); ?>" title="google+"><i class="icon-google-plus-sign"></i></a>-->
				<!--<?php } ?>-->

				<!--<?php //if( $pinterest ) { ?>-->
							<!--<a href="<?php //echo esc_url( $pinterest ); ?>" title="pinterest"><i class="icon-pinterest"></i></a>-->
				<!--<?php } ?>-->

				<!--<?php //if( $instagram ) { ?>-->
							<!--<a href="<?php //echo esc_url( $instagram ); ?>" title="instagram"><i class="icon-instagram"></i></a>-->
				<!--<?php } ?>-->

				<!--<?php //if( $stackexchange ) { ?>-->
							<!--<a href="<?php //echo esc_url( $stackexchange ); ?>" title="stackexchange"><i class="icon-stackexchange"></i></a>-->
				<!--<?php //} ?>-->

				<!--<?php //if( $tumblr ) { ?>-->	
							<!--<a href="<?php //echo esc_url( $tumblr ); ?>" title="tumblr"><i class="icon-tumblr-sign"></i></a>-->
				<!--<?php //} ?>-->

				<!--<?php //if( $dribbble ){ ?>-->
							<!--<a href="<?php //echo esc_url( $dribbble ); ?>" title="dribbble"><i class="icon-dribbble"></i></a>-->
				<!--<?php //} ?>-->

				<!--<?php //if( $flickr ) { ?>-->	
							<!--<a href="<?php //echo esc_url( $flickr ); ?>" title="flickr"><i class="icon-flickr"></i></a>-->
				<!--<?php //} ?>-->

				<!--<?php //if( $youtube ) { ?>-->	
							<!--<a href="<?php //echo esc_url( $youtube ); ?>" title="youtube"><i class="icon-youtube"></i></a>-->
				<!--<?php //} ?>-->

				<!--<?php //if( $rss ) { ?>-->
							<!--<a href="<?php //echo esc_url( $rss ); ?>" title="rss"><i class="icon-rss"></i></a>-->
				<!--<?php //} ?>-->

			<!--</p>-->


		<!--</div><!-- /#social-media -->
			
			<div id="footer-bottom-area" class="global-padding cf">				
				
				<p class="ctr"><?php echo $copyright ; ?></p>
				
			</div><!-- /#footer-bottom-area -->
			
		</footer><!-- /#main-footer -->


	</div><!-- /#global-container -->

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