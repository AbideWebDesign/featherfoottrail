<?php 
	
	// Template Name: Simple

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper-sm bg-secondary" id="single-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">
			
			<div class="col-12">

				<h1 class="text-center text-white"><?php the_title(); ?></h1>
				
				<div class="text-sm text-center">
										
					<?php
					
					if ( function_exists('yoast_breadcrumb') ) {
					
						yoast_breadcrumb( '<p id="breadcrumbs" class="mb-0">','</p>' );
					
					}
					
					?>
										
				</div>
			
			</div>
			
		</div>
		
	</div>
	
</div>

<div class="wrapper bg-white" id="single-content-wrapper">
	
	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-xl-8">
				
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php the_content(); ?>
				
				<?php endwhile; ?>
							
			</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->
		
<?php get_footer();
