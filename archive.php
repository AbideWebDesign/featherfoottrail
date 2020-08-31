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

<div class="wrapper-sm-bottom bg-secondary" id="archive-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<div class="col">
				
				<header class="page-header text-center">
					<?php
					the_archive_title( '<h1 class="page-title text-white">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->
				
			</div>
			
		</div>
		
	</div>
	
</div>

<div id="archive-loop-wrapper" class="wrapper bg-light">
	
	<div class="container">
		
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'loop-templates/content', 'single' ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'loop-templates/content', 'none' ); ?>

		<?php endif; ?>

		<!-- The pagination component -->
		<?php featherfoottrail_pagination(); ?>

	</div>

</div>

<?php get_footer();
