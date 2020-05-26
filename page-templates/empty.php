<?php
/**
 * Template Name: Empty Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div id="page-wrapper" class="bg-light py-5">

	<div class="container">
		
		<div class="row">
			
			<div class="col-12">
				
				<?php while ( have_posts() ) : the_post(); ?>
		
					<?php get_template_part( 'loop-templates/content', 'page' ); ?>
		
				<?php endwhile; // end of the loop. ?>
				
			</div>
		
		</div>

</div><!-- #page-wrapper -->

<?php get_footer();