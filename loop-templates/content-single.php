<?php
/**
 * Partial template for loop
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="bg-white shadow mb-4">	
	
	<div class="row no-gutters">
		
		<div class="col-lg-3">
					
			<?php if ( get_field('featured_image') ): ?>
				
				<?php $image = get_field('featured_image'); ?>
				
				<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $image, 'thumbnail', false, array('class'=>'img-fluid img-fill') ); ?></a>
			
			<?php endif; ?>
			
		</div>
		
		<div class="col-lg-9 align-self-center">
			
			<div class="p-5">
				
				<a class="nostyle" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
				
				<?php the_excerpt(); ?>
				
				<div class="d-none d-md-block"><a class="btn-alt" href="<?php the_permalink(); ?>"><img src="<?php the_field('button', 'options'); ?>" width="60px;" /> Read More</a></div>

				<div class="d-md-none text-center mt-3">
					
					<a class="btn-alt text-white" href="<?php the_permalink(); ?>"><img src="<?php the_field('button', 'options'); ?>" width="60px;" /> Read More</a>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>

