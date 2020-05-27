<?php
/**
 * Single post partial template
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<tr>

	<td>
		
		<div class="container py-3">
			
			<div class="row">
				
				<div class="col-xl-2">
					
					<?php if ( get_field('featured_image') ): ?>
					
						<?php $image = get_field('featured_image'); ?>
						
						<?php echo wp_get_attachment_image( $image['id'], 'thumbnail', false, array('class'=>'img-fluid') ); ?>
					
					<?php endif; ?>
					
				</div>
				
				<div class="col-xl-10">
					
					<a href="<?php the_permalink(); ?>"><?php the_title( '<h3 class="entry-title">', '</h3>' ); ?></a>
	
					<div class="py-2">
				
						<?php the_field('brief_description'); ?>
				
					</div>
					
				</div>
		
			</div>
			
		</div>
	
	</td>
	
</tr>