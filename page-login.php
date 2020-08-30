<?php
/**
 * Template Name: Login
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('simple');

?>

<div id="page-wrapper" class="bg-secondary">

	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-lg-6">
				
				<h1 class="text-white text-center mb-0 mt-5">Login</h1>
								
				<?php while ( have_posts() ) : the_post(); ?>
		
					<?php the_content(); ?>
		
				<?php endwhile; // end of the loop. ?>
					
				<div class="wrapper-sm text-center text-white">
				
					For general support please <a class="text-white plain" href="<?php echo home_url(); ?>/contact">contact us</a>.
				
				</div>
				
			</div>
		
		</div>

</div><!-- #page-wrapper -->

<div class="bg-white wrapper">
	
	<div class="text-center mt-4">

		<h2 class="mb-3">New Customer?</h2>
		
		<p class="mb-5">Start your Featherfoot Trail subscription today!</p>
	
		<a href="<?php echo home_url(); ?>/register/basic" class="btn btn-primary btn-lg">Sign Up Now</a>
		
	</div>
	
</div>

<?php get_footer();
