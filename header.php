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
		
		<div id="wrapper-header-img" class="d-none d-xl-block">
	
			<?php echo wp_get_attachment_image( get_field('header_image', 'options'), 'full', false ); ?>
	
		</div>
		
		<div id="wrapper-header-img-mobile" class="d-xl-none" style="background-image: url(<?php echo $header_img_mobile; ?>);">
			
			<div class="container-fluid">
				
				<div class="row justify-content-center">
					
					<div class="col-12 text-center">
						
						<a href="<?php echo home_url(); ?>"><?php echo wp_get_attachment_image( get_field('logo','options'), 'Full', false, array( 'class' => 'logo', 'style' => 'width:300px' ) ); ?></a>
						
					</div>
					
					<div class="col-12  bg-primary py-2">
						
						<div class="d-flex justify-content-between">
													
							<div>
						
								<?php shiftnav_toggle( 'shiftnav-main' , '' , array( 'icon' => 'bars' , 'class' => 'shiftnav-toggle-button') ); ?>
								
							</div>
							
							<div class="align-self-center">
								
								<div class="mr-3">
									
									<?php if ( is_user_logged_in() ): ?>
									
										<a href="<?php echo home_url('/signup'); ?>" class="text-white text-lg"><i class="fa fa-user text-white mr-2"></i> <strong>Account</strong></a>
									
									<?php else: ?>
									
										<a href="<?php echo home_url('/login'); ?>" class="text-white text-lg"><i class="fa fa-user text-white mr-2"></i> <strong>Login/Sign Up</strong></a>
										
									<?php endif; ?>
								
								</div>
								
							</div>
															
						</div>
						
					</div>
					
				</div>
				
			</div>
						
		</div>
		
		<div id="wrapper-menu" class="py-2">

			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'featherfoottrail' ); ?></a>
	
			<h2 id="main-nav-label" class="sr-only">
				
				<?php esc_html_e( 'Main Navigation', 'featherfoottrail' ); ?>
			
			</h2>
			
			<div class="container">
				
				<div class="row justify-content-center no-gutters">
					
					<div class="col-auto">
						
						<div id="wrapper-logo">
						
							<a href="<?php echo home_url(); ?>"><?php echo wp_get_attachment_image( get_field('logo','options'), 'Full', false, array('class'=>'logo', 'style'=>'width:300px') ); ?></a>
						
						</div>
						
					</div>
					
					<div class="col-12 d-none d-xl-block">
						
						<nav id="main-nav" class="navbar navbar-expand-lg" aria-labelledby="main-nav-label">
							
							<div class="collapse navbar-collapse">
								
								<ul class="navbar-nav w-100">
								
									<li class="nav-item flex-fill"><a id="navlink-1" href="<?php the_field('nav_link_1', 'options'); ?>"><?php echo wp_get_attachment_image( get_field('nav_link_image_1', 'options'), 'full', false, array('style'=>'width: 190px') ); ?></a></li>
						
									<li class="nav-item flex-fill"><a id="navlink-2" href="<?php the_field('nav_link_2', 'options'); ?>"><?php echo wp_get_attachment_image( get_field('nav_link_image_2', 'options'), 'full', false, array('style'=>'width: 162px') ); ?></a></li>

									<li class="nav-item flex-fill"><a id="navlink-3" href="<?php the_field('nav_link_3', 'options'); ?>"><?php echo wp_get_attachment_image( get_field('nav_link_image_3', 'options'), 'full', false, array('style'=>'width: 152px') ); ?></a></li>

									<li class="nav-item flex-fill"><a id="navlink-4" href="<?php the_field('nav_link_4', 'options'); ?>"><?php echo wp_get_attachment_image( get_field('nav_link_image_4', 'options'), 'full', false, array('style'=>'width: 152px') ); ?></a></li>

									<li class="nav-item flex-fill"><a id="navlink-5" href="<?php the_field('nav_link_5', 'options'); ?>"><?php echo wp_get_attachment_image( get_field('nav_link_image_5', 'options'), 'full', false, array('style'=>'width: 152px') ); ?></a></li>
						
									<li class="nav-item flex-fill"><a id="navlink-6" href="<?php the_field('nav_link_6', 'options'); ?>"><?php echo wp_get_attachment_image( get_field('nav_link_image_6', 'options'), 'full', false, array('style'=>'width: 162px') ); ?></a></li>

									<li class="nav-item flex-fill"><a id="navlink-7" href="<?php the_field('nav_link_7', 'options'); ?>"><?php echo wp_get_attachment_image( get_field('nav_link_image_7', 'options'), 'full', false, array('style'=>'width: 190px') ); ?></a></li>
								
								</ul>
								
							</div>
							
						</nav>
						
					</div>
										
				</div>
			
			</div><!-- .container -->	
			
		</div>	
	
	</div><!-- #wrapper-navbar end -->
