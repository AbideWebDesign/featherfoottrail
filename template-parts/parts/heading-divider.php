<?php 

	switch ( $args['type'] ) {
		
		case 'white': 
		
			$img = get_field('feather_1', 'options');
			
			break;
			
		case 'blue':
		
			$img = get_field('feather_2', 'options');
			
			break;
			
		case 'red':
		
			$img = get_field('feather_3', 'options');
			
			break;
			
		case 'yellow':
		
			$img = get_field('feather_4', 'options'); 
			
			break;
			
		default:
		
			$img = get_field('feather_1', 'options');
		
	}
	
	switch ( $args['color'] ) {
			
		case 'light':
		
			$class = 'heading-divider-light';
			
			break;
		
	}
	
?>


<div class="heading-divider <?php echo $class; ?> text-center mb-3 mb-xl-5">
	
	<img src="<?php echo $img; ?>" width="75px">
	
</div>