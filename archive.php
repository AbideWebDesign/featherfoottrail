<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper bg-light" id="wrapper-resource">

	<div class="container" id="content" tabindex="-1">

		<div class="row">
			
			<div class="col-12 d-md-none d-lg-none d-xl-none">
			
				<button class="facetwp-flyout-open btn btn-primary">Filter</button>
			
			</div>
			
			<div id="wrapper-sidebar" class="col-xl-4 d-none d-md-block">
				
				<div class="sidebar bg-white">
					
					<div class="sidebar-heading bg-primary p-2 mb-2">
				
						<h4 class="text-white mb-0">Filter</h4>
						
					</div>
					
					<?php echo do_shortcode( '[facetwp facet="search_resources"]' ); ?>
					
					<?php echo do_shortcode( '[facetwp facet="categories"]' ); ?>
					
					<button class="btn btn-primary btn-block" onclick="FWP.reset()">Clear</button>
					
				</div>
				
			</div>
			
			<div id="wrapper-content" class="col-xl-8">
				
				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					
					<div class="row justify-content-between">
						
						<div class="col-auto">
							
							<?php echo do_shortcode( '[facetwp facet="result_count_resources"]' ); ?>
							
						</div>
						
						<div class="col-md-auto">
							
							<?php echo do_shortcode( '[facetwp facet="per_page_resources"]' ); ?>
							
						</div>
						
					</div>
					
					<div class="table-responsive bg-white">
						
						<table class="table table-bordered table-striped table-sm">
							
							<tr class="bg-primary">
								<th class="text-white  p-2">Results</th>
								
							</tr>
						
							<?php while ( have_posts() ) : the_post(); ?>
		
								<?php get_template_part( 'loop-templates/content', 'single' ); ?>
		
							<?php endwhile; ?>
							
						</table>
						
					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

				<!-- The pagination component -->
				<?php echo do_shortcode( '[facetwp facet="load_more_resources"]' ) ?>
			
			</div>

		</div> <!-- .row -->

	</div><!-- #content -->

</div><!-- #wrapper -->

<?php get_footer();
