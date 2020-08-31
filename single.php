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

<div class="wrapper-sm-bottom bg-secondary" id="single-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">
			
			<div class="col-12">

				<h1 class="text-center text-white"><?php the_title(); ?></h1>
				
				<div class="text-sm text-center">
										
					<?php $cats = get_the_category(); ?>
					
					<?php foreach ( $cats as $cat ): ?>
					
						<a class="text-white" href="<?php echo home_url(); ?>/category/<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a>
					
					<?php endforeach; ?>
					
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
				
					<?php get_template_part('loop-templates/content', 'post'); ?>
				
				<?php endwhile; ?>
							
			</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->
		
<?php get_footer();
