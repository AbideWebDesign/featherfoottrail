<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$header_img_mobile = wp_get_attachment_image_url( get_field('header_image_mobile', 'options'), 'full', false );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;800&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">

</head>

<body <?php body_class(); ?>>
	
<div class="site" id="page">
	
	<div id="wrapper-navbar">
				
		<div id="wrapper-menu-simple" class="bg-primary">

			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'featherfoottrail' ); ?></a>
	
			<h2 id="main-nav-label" class="sr-only">
				
				<?php esc_html_e( 'Main Navigation', 'featherfoottrail' ); ?>
			
			</h2>
			
			<div class="container">
				
				<div class="row justify-content-center no-gutters">
					
					<div class="col-auto">
						
						<div id="wrapper-logo">
						
							<a href="<?php echo home_url(); ?>"><?php echo wp_get_attachment_image( get_field('logo','options'), 'Full', false, array('class'=>'logo', 'style'=>'width:150px') ); ?></a>
						
						</div>
						
					</div>
										
				</div>
			
			</div><!-- .container -->	
			
		</div>	
	
	</div><!-- #wrapper-navbar end -->
	
	<div class="pb-5 bg-secondary"></div>