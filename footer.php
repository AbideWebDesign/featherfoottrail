<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

	<div class="bg-primary py-3" id="wrapper-footer">
	
		<div class="container">
	
			<div class="row">
	
				<div class="col-md-12">
	
					<footer class="site-footer" id="colophon">
	
						<div class="site-info">
	
							<?php the_field('footer_bottom_text', 'options'); ?>
						
						</div><!-- .site-info -->
	
					</footer><!-- #colophon -->
	
				</div><!--col end -->
	
			</div><!-- row end -->
	
		</div><!-- container end -->
	
	</div><!-- wrapper end -->

</div>

<?php wp_footer(); ?>

</body>

</html>

