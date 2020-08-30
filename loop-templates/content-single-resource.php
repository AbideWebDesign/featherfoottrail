<?php
/**
 * Single post partial template
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<div class="bg-white shadow mb-4">			

	<div class="row no-gutters">
		
		<div class="col-xl-3">
			
			<?php if ( get_field('featured_image') ): ?>
			
				<?php $image = get_field('featured_image'); ?>
				
				<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $image['id'], 'thumbnail', false, array('class'=>'img-fluid img-fill') ); ?></a>
			
			<?php endif; ?>
			
		</div>
		
		<div class="col-xl-9 align-self-center">
			
			<div class="p-4">
				
				<div class="text-sm mb-3"><strong>
					
					<?php $cats = get_field('categories'); ?>
					
					<?php foreach($cats as $cat): ?>
					
						| <a href="<?php echo home_url(); ?>/resources/?_categories=<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a>
					
					<?php endforeach; ?>
					
				</strong></div>
				
				<a href="<?php the_permalink(); ?>"><?php the_title( '<h3 class="entry-title">', '</h3>' ); ?></a>
		
				<div class="py-2">
			
					<?php the_field('brief_description'); ?>
			
				</div>
				
			</div>
			
		</div>
	
	</div>

</div>
			
