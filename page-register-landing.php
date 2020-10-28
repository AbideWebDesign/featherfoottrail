<?php
/**
 * Template Name: Register Landing
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('simple');

?>

<div id="page-wrapper" class="bg-secondary wrapper">

	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-lg-6">
				
				<h1 class="text-white text-center mb-5">Select a Plan</h1>
									
			</div>
		
		</div>
		
		<div class="row justify-content-center">
			
			<div class="col-lg-5">
				
				<div class="bg-light p-3 text-center mb-3 mb-md-0">
					
					<div class="text-center mb-4">
						
						<img src="<?php the_field('feather_1', 'options'); ?>" width="75" />
						
					</div>
					
					<h3 class="mb-3">Personal Plan</h3>
					
					<h2 class="text-brown mb-4">$9.95<span>/month</span></h2>
					
					<a href="<?php echo home_url('/register/basic'); ?>" class="btn btn-secondary btn-block btn-lg">Sign Up Now</a>
					
				</div>
				
			</div>
			
			<div class="col-lg-5">
				
				<div class="bg-light p-3 text-center">
					
					<div class="text-center mb-4">
						
						<img src="<?php the_field('feather_1', 'options'); ?>" width="75" />
						
					</div>
					
					<h3 class="mb-3">Classroom Plan</h3>
					
					<h2 class="text-brown mb-4">$14.95<span>/month</span></h2>
					
					<a href="<?php echo home_url('/register/classroom'); ?>" class="btn btn-secondary btn-block btn-lg">Sign Up Now</a>
					
				</div>				
				
				
			</div>
			
		</div>
		
	</div>

</div><!-- #page-wrapper -->

<?php echo get_template_part('template-parts/parts/content', 'membership-promo'); ?>

<?php get_footer();
