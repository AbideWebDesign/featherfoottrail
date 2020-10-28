<?php
/**
 * Template Name: Register Personal
 *
 * @package featherfoottrail
 */
// Dev is id: 1461
// Production id: 2074
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('simple');

?>

<div id="page-wrapper" class="bg-secondary py-5">

	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-lg-6">
				
				<h1 class="text-white text-center mb-0">Create an Account</h1>
								
				<?php while ( have_posts() ) : the_post(); ?>
		
					<?php echo do_shortcode('[mepr-membership-registration-form id="2074"]' ); ?>
		
				<?php endwhile; // end of the loop. ?>
									
			</div>
		
		</div>

</div><!-- #page-wrapper -->

<?php get_footer();
