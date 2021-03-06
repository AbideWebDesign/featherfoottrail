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

$separator = ' | ';

$output = '';

foreach( $cats as $category ) {
	
	$url = '/resources/?_categories=' . $category->slug;
	
	$output .= '<a class="text-primary" href="' . $url . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'featherfoottrail' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;

}

?>

<div class="wrapper-sm bg-secondary" id="single-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">
			
			<div class="col-12">
				
				<div class="d-flex">
					
					<div class="align-self-center flex-grow-1">
			
						<h1 class="text-white"><?php the_title(); ?></h1>
						
						<?php if ( get_field('brief_description') ): ?>
						
							<p class="text-white lead mb-0"><?php the_field('brief_description'); ?></p>
							
						<?php endif; ?>
						
					</div>
					
					<?php if ( !current_user_can('mepr-active') ): ?>
				
					<div class="ml-5 bg-light p-4 col-xl-3 text-center align-self-center">
						
						<h3>View This Resource</h3>
						
						<p class="text-sm">To view this resource, please login</p>
						
						<a href="<?php echo home_url('/register/basic'); ?>" class="btn btn-primary btn-block">Register</a>
						
						<div class="text-sm">or</div>
						
						<a href="<?php echo home_url('/login'); ?>" class="btn btn-secondary btn-block">Login</a>
						
					</div>
				
				<?php endif; ?>
				
				</div>
				
			</div>
			
		</div>

	</div>

</div>

<div class="wrapper-xs bg-brown">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-auto mr-5">
				
				<h5 class="text-white">Resource Categories</h5>
				
				<p class="text-primary text-sm mb-0"><?php echo trim( $output, $separator ); ?></p>
			
			</div>
			
			<div class="col-auto">
				
				<h5 class="text-white">Resource Contents</h5>
				
				<ul class="list-inline mb-0 text-sm text-primary">
					
					<?php if ( get_field('media_files') ): ?>
					
						<li class="list-inline-item"><i class="fa fa-file-download"></i> Media</li>
					
					<?php endif; ?>
					
					<?php if ( get_field('video_file') ): ?>
					
						<li class="list-inline-item"><i class="fa fa-video"></i> Video</li>
					
					<?php endif; ?>
					
					<?php if ( get_field('audio_repeater') ): ?>
					
						<li class="list-inline-item"><i class="fa fa-music"></i> Audio</li>
					
					<?php endif; ?>

					<?php if ( get_field('activities') ): ?>
					
						<li class="list-inline-item"><i class="fa fa-play"></i> Activities</li>
					
					<?php endif; ?>
					
					<?php if ( get_field('books_stories') ): ?>
					
						<li class="list-inline-item"><i class="fa fa-book"></i> Books/Stories</li>
					
					<?php endif; ?>
					
					<?php if ( get_field('jigsaw_puzzle') ): ?>
					
						<li class="list-inline-item"><i class="fa fa-puzzle-piece"></i> Jigsaw Puzzle</li>
					
					<?php endif; ?>
					
				</ul>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<?php if ( current_user_can('mepr-active') ): ?>

	<?php if ( get_field('full_description') ): ?>
	
		<div class="wrapper-sm bg-white">
			
			<div class="container">
				
				<div class="row justify-content-center">
					
					<?php if ( get_field('featured_image') ): ?>
					
						<?php $image = get_field('featured_image'); ?>
						
						<div class="col-lg-3">
							
							<?php echo wp_get_attachment_image( $image['id'], 'thumbnail', false, array('class'=>'img-fluid img-fill') ); ?>	
							
						</div>
					
					<?php endif; ?>
					
					<div class="col-lg-8 align-self-center <?php echo (get_field('featured_image') ? '' : 'text-center'); ?>">
						
						<h2>Resource Description</h2>
						
						<p><?php the_field('full_description'); ?></p>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
	
	<?php endif; ?>
							
	<?php if ( have_rows('media_files') ): ?>
	
		<div class="wrapper-sm bg-white">
			
			<div class="container">
				
				<div class="row">
					
					<div class="col-12 text-center mb-4">
						
						<?php echo get_template_part( 'template-parts/parts/heading', 'divider', array( 'color'=>'dark', 'type'=>'white' ) ); ?>
						
						<h2>Media</h2>
						
					</div>
					
				</div>
				
				<?php while ( have_rows('media_files') ): the_row(); ?>
				
					<?php $media = get_sub_field('file'); ?>
										
					<?php if ( $media['mime_type'] == 'application/pdf' ): ?>
						
						<div class="row justify-content-center no-gutters mb-4">
							
							<div class="col-lg-3">
								
								<div class="bg-primary p-3 py-4">
									
									<p class="text-white mb-0"><strong><?php the_sub_field('name'); ?></strong></p>
									
								</div>
								
							</div>
							
							<div class="col-lg-9 align-self-stretch">
			
								<div class="d-flex bg-light h-100 p-3 border align-items-center">
									
									<div class="d-flex align-items-center">
										
										<i class="fa fa-download text-primary mr-2"></i> <a class="media-download" href="<?php echo $media['url']; ?>" target="_blank">Download: <?php echo $media['title']; ?></a>
									
									</div>
									
								</div>
								
							</div>
							
						</div>
					
					<?php else: ?>
					
						<div class="row justify-content-center no-gutters mb-4">
							
							<div class="col-lg-3">
																	
								<div class="bg-primary h-100 p-3">
								
									<p class="text-white mb-0"><strong><?php the_sub_field('name'); ?></strong></p>
									
								</div>
								
							</div>
							
							<div class="col-lg-9">
					
								<?php echo wp_get_attachment_image( $media['id'], 'full', false, array('class'=>'img-fluid img-fill') ); ?>
								
							</div>
							
						</div>
						
					<?php endif; ?>
								
			<?php endwhile; ?>
			
			</div>

		</div>
						
	<?php endif; ?>
					
	<?php if ( get_field('video_file') ): ?>
		
		<?php //$bg_paper = wp_get_attachment_image_url( get_field('paper_background', 'options'), 'full', false ); ?>
		
		<?php $videos = explode( ' ', get_field('video_file') ); ?>
		
		<div class="wrapper bg-light">
	
			<div class="container">
				
				<div class="row">
					
					<div class="col text-center mb-4">
						
						<?php echo get_template_part( 'template-parts/parts/heading', 'divider', array( 'color'=>'dark', 'type'=>'blue' ) ); ?>

						<h2>Video</h2>
						
					</div>
					
				</div>
				
				
				
					<div class="row justify-content-center">
						
						<div class="col-lg-9">
							
							<?php foreach( $videos as $video ): ?>
							
								<?php $video_url = get_video_embed( $video ); ?>
								
		<!-- 						<div class="bg-paper bg-video d-flex" style="background:url(<?php echo $bg_paper; ?>);"> -->
								
		<!-- 							<div class="p-3 p-md-5 w-100 align-self-center"> -->
																			
										<div class="embed-responsive embed-responsive-16by9 mb-4">
		
											<iframe class="embed-responsive-item" src="<?php echo $video_url; ?>?theme=dark&rel=0&autoplay=1&autohide=0&cc_load_policy=1&modestbranding=1&fs=0&showinfo=0&rel=0&iv_load_policy=3&mute=0&loop=1" sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin allow-top-navigation" allowfullscreen></iframe>
				
<!-- 											<div class="overlay video-trigger" src="<?php echo $video_url; ?>" data-target="#videoModal" data-toggle="modal"></div> -->
										   
										</div>
																			
		<!-- 							</div> -->
									
		<!-- 						</div> -->
		
							<?php endforeach; ?>
													
						</div>
						
					</div>
					
				
								
			</div>
			
		</div>
					
	<?php endif; ?>
					
	<?php if ( get_field('audio_repeater') ): ?>
	
		<div id="wrapper-audio" class="wrapper bg-secondary">
				
				<div class="container">
					
					<div class="row">
					
						<div class="col text-center mb-4">
							
							<?php echo get_template_part( 'template-parts/parts/heading', 'divider', array( 'color'=>'light', 'type'=>'white' ) ); ?>


							<h2 class="text-white">Audio Files</h2>
							
						</div>
						
					</div>

					<div class="row">
						
						<div class="col-12">
							
							<div class="bg-primary p-4">
								
								<table class="table table-bordered bg-white text-sm mb-0">
									
									<tr>
										
										<th>Name</th>
										
										<th>Description</th>
										
										<th>Listen</th>
										
									</tr>
									
									<?php if ( get_field('audio_repeater') ): ?>
		
										<?php while ( have_rows('audio_repeater') ): the_row(); ?>
										
											<?php if ( get_sub_field('audio_type') == 'URL'): ?>
											
												<?php $file = get_sub_field('audio_repeater_url'); ?>
																								
											<?php else: ?>
											
												<?php $file = get_sub_field('audio_repeater_file'); ?>
											
											<?php endif; ?>
											
											<tr>

												<td>
													
													<?php if ( $file['title'] ): ?>
														
														<p class="mb-0"><?php echo $file['title']; ?></p>
														
													<?php else: ?>
													
														<p class="mb-0"><?php echo $file['filename']; ?></p>
		
													<?php endif; ?>
													
												</td>
												
												<td>
													
													<?php if ( $file['description'] ): ?>
								
														<p><?php echo $file['description']; ?></p>
													
													<?php else: ?>
													
														-
																				
													<?php endif; ?>
		
												</td>
												
												<td>
													
													<?php echo do_shortcode( '[audio src="' . $file['url'] . '" loop=yes]' ); ?>
													
												</td>
												
											</tr>
										
										<?php endwhile; ?>
		
									<?php endif; ?>
																		
								</table>
								
							</div>
						
						</div>
						
					</div>
					
				</div>
				
			</div>
											
		<?php endif; ?>
										
		<?php if ( get_field('jigsaw_puzzle') ): ?>
						
			<?php $url = get_field('jigsaw_puzzle'); ?>
			
			<div class="wrapper bg-white">
				
				<div class="container">
					
					<div class="row justify-content-center">
						
						<div class="col-12 text-center">
							
							<?php echo get_template_part( 'template-parts/parts/heading', 'divider', array( 'color'=>'dark', 'type'=>'red' ) ); ?>

							<h2>Puzzles</h2>
							
							<div class="embed-responsive embed-responsive-16by9">
							
								<iframe class="embed-responsive-item" src="<?php echo $url; ?>&amp;view=iframe" allowfullscreen></iframe>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
										
		<?php endif; ?>				
				
	<?php else: ?>
	
		<?php echo get_template_part('template-parts/parts/content', 'membership-promo'); ?>
			
	<?php endif; ?>

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

<?php if ( get_field('video_file') ): ?>

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
	
<?php endif; ?>
	
<?php get_footer();
