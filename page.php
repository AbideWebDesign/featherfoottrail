<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div id="page-wrapper" class="bg-secondary py-5">

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
