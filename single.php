<?php
/**
 * The template for displaying all single posts
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper" id="single-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">
			
			<div class="col-12">

				<h1 class="text-center"><?php the_title(); ?></h1>
				
				<div class="text-sm mb-2 pb-2 border-bottom text-center">
					
					Categories:
					
				</div>
			
			</div>
			
		</div>
		
		<div class="row">
			
			<div class="col-xl-8">
				
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part('loop-templates/content', 'post'); ?>
				
				<?php endwhile; ?>
							
			</div>
			
			<div class="col-xl-4">
				
				<h3>Sidebar</h3>
								
			</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->
		
<?php get_footer();
