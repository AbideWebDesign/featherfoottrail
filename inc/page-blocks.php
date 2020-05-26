<?php 
	
add_action('acf/init', 'featherfoottrail_acf_init');

function featherfoottrail_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a testimonial block
		acf_register_block(array(
			'name'				=> 'side-by-side',
			'title'				=> __('Side by Side - Image and Text'),
			'description'		=> __('Side by side block including a image and text.'),
			'render_callback'	=> 'featherfoottrail_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'align-left',
		));
	}
}

function featherfoottrail_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/blocks" folder
	if( file_exists( get_theme_file_path("/template-parts/blocks/content-{$slug}.php") ) ) {
		
		include( get_theme_file_path("/template-parts/blocks/content-{$slug}.php") );
	
	}
}

function get_video_embed( $video ) { 
	 
	$video_id = substr( $video, strrpos($video, '/') + 1 );  
	
	return 'https://www.youtube.com/embed/' . $video_id;  
	
}