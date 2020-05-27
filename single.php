<?php
/**
 * The template for displaying all single posts
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$cats = get_field('categories');

$separator = ' ';

$output = '';

foreach( $cats as $category ) {
	
	$url = '/resources/?_categories=' . $category->slug;
	
	$output .= '<a href="' . $url . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;

}

?>

<div class="wrapper" id="single-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">
			
			<div class="col-12">

				<h1 class="text-center"><?php the_title(); ?></h1>
				
				<div class="text-sm mb-2 pb-2 border-bottom text-center">
					
					Categories: <?php echo trim( $output, $separator ); ?>
					
				</div>
			
			</div>
			
		</div>
		
		<div class="row">
			
			<div class="col-xl-8">
				
				<?php if ( get_field('featured_image') ): ?>
					
					<div class="text-center">
										
						<?php $image = get_field('featured_image'); ?>
						
						<?php echo wp_get_attachment_image( $image['id'], 'resource featured', false, array('class'=>'img-fluid') ); ?>
						
					</div>
					
				<?php endif; ?>
				
				<?php if ( get_field('brief_description') ): ?>
				
					<div class="mb-3">
						
						<h3>Brief Description</h3>
						
						<?php the_field('brief_description'); ?>
					
					</div>
					
				<?php endif; ?>
				
				<?php if ( get_field('full_description') ): ?>
					
					<h3>Description</h3>
				
					<?php the_field('full_description'); ?>
					
				<?php endif; ?>
				
				<?php if ( current_user_can('mepr-active') ): ?>
				
					<?php if ( have_rows('media_files') ): ?>
					
						<h3>Media</h3>
						
						<?php while ( have_rows('media_files') ): the_row(); ?>
						
							<?php $media = get_sub_field('file'); ?>
							
							<?php if ( $media['mime_type'] == 'application/pdf' ): ?>
							
								<i class="fa fa-download text-primary"></i> <a class="media-download" href="<?php echo $media['url']; ?>" target="_blank"><?php echo $media['title']; ?></a>
							
							<?php else: ?>
							
								<?php echo wp_get_attachment_image( $media['id'], 'full', false, array('class'=>'img-fluid') ); ?>
								
							<?php endif; ?>
						
						<?php endwhile; ?>
										
					<?php endif; ?>
					
					<?php if ( get_field('video_file') ): ?>
					
						<?php $video_url = get_video_embed( get_field('video_file') ); ?>
						
						<h3>Video</h3>
						
						<div class="embed-responsive embed-responsive-16by9">
							
							  <iframe class="embed-responsive-item" src="<?php echo $video_url; ?>" allowfullscreen></iframe>
	
							   <div class="overlay video-trigger" src="<?php echo $video_url; ?>" data-target="#videoModal" data-toggle="modal"></div>
							   
						</div>
					
					<?php endif; ?>
					
					<?php if ( get_field('audio_file') ): ?>
	
						<?php $file = get_field('audio_file'); ?>
	
						<h3><?php echo $file['title']; ?></h3>
						
						<p><?php echo $file['filename']; ?></p>
						
						<?php if ( $file['description'] ): ?>
						
							<p><?php echo $file['description']; ?></p>
												
						<?php endif; ?>
						
						<?php echo do_shortcode( '[audio ' . $file['url'] . ' loop=yes]' ); ?>
					
					<?php endif; ?>
					
					<?php if ( get_field('audio_file_2') ): ?>
						
						<?php $file = get_field('audio_file_2'); ?>
						
						<h3><?php echo $file['title']; ?></h3>
						
						<?php if ( $file['description'] ): ?>
						
							<p><?php echo $file['description']; ?></p>
						
						<?php endif; ?>
						
						<?php echo do_shortcode( '[audio ' . $file['url'] . ' loop=yes]' ); ?>
					
					<?php endif; ?>
					
					<?php if ( get_field('audio_file_3') ): ?>
						
						<?php $file = get_field('audio_file_3'); ?>
						
						<h3><?php echo $file['title']; ?></h3>
						
						<?php if ( $file['description'] ): ?>
						
							<p><?php echo $file['description']; ?></p>
						
						<?php endif; ?>
						
						<?php echo do_shortcode( '[audio ' . $file['url'] . ' loop=yes]' ); ?>
					
					<?php endif; ?>
					
					<?php if ( get_field('audio_file_4') ): ?>
						
						<?php $file = get_field('audio_file_4'); ?>
						
						<h3><?php echo $file['title']; ?></h3>
						
						<?php if ( $file['description'] ): ?>
						
							<p><?php echo $file['description']; ?></p>
						
						<?php endif; ?>
						
						<?php echo do_shortcode( '[audio ' . $file['url'] . ' loop=yes]' ); ?>
					
					<?php endif; ?>
					
					<?php if ( get_field('audio_file_5') ): ?>
						
						<?php $file = get_field('audio_file_5'); ?>
						
						<h3><?php echo $file['title']; ?></h3>
						
						<?php if ( $file['description'] ): ?>
						
							<p><?php echo $file['description']; ?></p>
						
						<?php endif; ?>
						
						<?php echo do_shortcode( '[audio ' . $file['url'] . ' loop=yes]' ); ?>
					
					<?php endif; ?>
					
					<?php if ( get_field('audio_file_6') ): ?>
						
						<?php $file = get_field('audio_file_6'); ?>
						
						<h3><?php echo $file['title']; ?></h3>
						
						<?php if ( $file['description'] ): ?>
						
							<p><?php echo $file['description']; ?></p>
						
						<?php endif; ?>
						
						<?php echo do_shortcode( '[audio ' . $file['url'] . ' loop=yes]' ); ?>
					
					<?php endif; ?>
					
					<?php if ( get_field('audio_file_7') ): ?>
						
						<?php $file = get_field('audio_file_7'); ?>
						
						<h3><?php echo $file['title']; ?></h3>
						
						<?php if ( $file['description'] ): ?>
						
							<p><?php echo $file['description']; ?></p>
						
						<?php endif; ?>
						
						<?php echo do_shortcode( '[audio ' . $file['url'] . ' loop=yes]' ); ?>
					
					<?php endif; ?>
					
					<?php if ( get_field('audio_file_8') ): ?>
						
						<?php $file = get_field('audio_file_8'); ?>
	
						<h3><?php echo $file['title']; ?></h3>
											
						<?php if ( $file['description'] ): ?>
						
							<p><?php echo $file['description']; ?></p>
						
						<?php endif; ?>
						
						<?php echo do_shortcode( '[audio ' . $file['url'] . ' loop=yes]' ); ?>
					
					<?php endif; ?>
					
				<?php endif; ?>
				
			</div>
			
			<div class="col-xl-4">
				
				<?php if ( !current_user_can('mepr-active') ): ?>
				
					<div class="bg-light p-3">
						
						<h3>View This Resource</h3>
						
						<a href="<?php echo home_url('/register/basic'); ?>" class="btn btn-primary">Register</a>
						
						<div class="text-sm">or</div>
						
						<a href="<?php echo home_url('/login'); ?>" class="btn btn-secondary">Login</a>
						
					</div>
				
				<?php endif; ?>
				
			</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<div class="modal fade" id="modalNotification" tabindex="-1" role="dialog" aria-labelledby="modalNotification" aria-hidden="true">
	
	<div class="modal-dialog" role="document">
	
		<div class="modal-content">
	
			<div class="modal-header">
	
				<h5 class="modal-title" id="modalNotificationLable">Notice</h5>
	
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	
					<span aria-hidden="true">&times;</span>
	
				</button>
	
			</div>
	
			<div class="modal-body">
	
				<p class="mb-0"><?php the_field('resource_disclaimer', 'options'); ?></p>
	
			</div>
	
			<div class="modal-footer">
	
				<a id="resourceLink" href="#" class="btn btn-primary btn-block" target="_blank">Proceed</a>
	
			</div>
	
		</div>
	
	</div>

</div>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
	
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	
		<div class="modal-content">
		
			<div class="modal-body p-0">
	
				<div class="embed-responsive embed-responsive-16by9">
        
					<iframe class="embed-responsive-item" src="" allow="autoplay; encrypted-media" allowfullscreen></iframe>
     
				</div>	
				
			</div>
		
		</div>
	
	</div>

</div>
		
<?php get_footer();
