<?php
/**
 * Partial template for content in home page
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$args = array(
	'numberposts'	=> 1,
);

$featured_post = get_posts( $args );

$args = array(
	'offset'		=> 1,
	'numberposts'	=> 10,
);
 
$latest_posts = get_posts( $args );

?>

<div class="container">
	
	<div class="row">
		
		<div class="col-lg-8">
			
			<h2>Featured Post</h2>
			
			<?php foreach ( $featured_post as $post ): ?>
			
				<?php setup_postdata( $post ); ?>
				
				<h3><?php the_title(); ?></h3>
				
				<div class="py-3">
					
					<?php the_content(); ?>
					
				</div>
			
			<?php endforeach; ?>
			
			<h2>Latest Posts</h2>
			
			<?php foreach ( $latest_posts as $post ): ?>
			
				<?php setup_postdata( $post ); ?>
				
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				
			
			<?php endforeach; ?>
			
		</div>
		
	</div>
	
</div>


