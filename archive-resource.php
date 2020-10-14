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

<div class="bg-secondary wrapper wrapper-sm-bottom">

	<div class="container">
		
		<div class="row">
		
			<div class="col-xl-5 align-self-center">
			
				<h1 class="text-white">Resource library</h1>
				
			</div>
			
			<div class="col-xl-7">
				
				<p class="lead mb-0 text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<div class="wrapper-sm bg-light" id="wrapper-resource">

	<div class="container" id="content" tabindex="-1">
		
		<div class="row">
			
			<div class="col-12 d-md-none d-lg-none d-xl-none">
			
				<button class="facetwp-flyout-open btn btn-primary">Filter</button>
			
			</div>
			
			<div id="wrapper-sidebar" class="col-xl-4 d-none d-md-block">
				
				<div class="bg-brown px-3 py-4">
								
					<?php echo do_shortcode( '[facetwp facet="search_resources"]' ); ?>
					
				</div>
							
				<div class="mt-3">
							
					
							
				</div>
				
				<div class="sidebar bg-white">
					
					<div class="sidebar-heading bg-primary p-2 mb-2">
				
						<div class="text-white mb-0">Filters</div>

					</div>
									
					<?php echo do_shortcode( '[facetwp facet="categories"]' ); ?>
					
					<button class="btn btn-primary btn-block" onclick="FWP.reset()">Clear</button>
					
				</div>
				
			</div>
			
			<div id="wrapper-content" class="col-xl-8">
				
				<div class="row justify-content-between">
												
					<div class="col-md-auto mb-3">

						<?php echo do_shortcode( '[facetwp sort="true"]' ); ?>
						
					</div>
					
					<div class="col-md-auto align-self-center">
						
						<?php echo do_shortcode( '[facetwp facet="result_count_resources"]' ); ?>
						
					</div>
					
				</div>
				
				<div class="row">
					
					<div class="col-12">
				
						<?php if ( have_posts() ) : ?>
												
							<?php while ( have_posts() ) : the_post(); ?>
		
								<?php get_template_part( 'loop-templates/content', 'single-resource' ); ?>
		
							<?php endwhile; ?>
					
						<?php else : ?>
		
							<?php get_template_part( 'loop-templates/content', 'none' ); ?>
		
						<?php endif; ?>
		
						<!-- The pagination component -->
						<?php echo do_shortcode( '[facetwp facet="load_more_resources"]' ) ?>
			
					</div>

				</div> <!-- .row -->
				
			</div>
			
		</div>

	</div><!-- #content -->

</div><!-- #wrapper -->

<?php get_footer();
