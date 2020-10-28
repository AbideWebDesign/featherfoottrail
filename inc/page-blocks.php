<?php 

function get_video_embed( $video ) { 
	 
	$video_id = substr( $video, strrpos($video, '/') + 1 );  
	
	return 'https://www.youtube.com/embed/' . $video_id;  
	
}