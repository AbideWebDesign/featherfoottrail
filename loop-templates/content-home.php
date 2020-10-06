<?php
/**
 * Partial template for content in home page
 *
 * @package featherfoottrail
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$args = array(
	'numberposts'	=> 1,
);

$featured_post = get_posts( $args );
$bg_paper = wp_get_attachment_image_url( get_field('paper_background', 'options'), 'full', false );
$bg_celebrate = wp_get_attachment_image_url( get_field('celebrate_background', 'options'), 'full', false );
?>

<div class="container">
	
	<div class="row justify-content-center">
		
		<div class="col-md-12 col-lg-10 col-xl-8">
			
			<div class="featured-content-header pt-4 d-md-none">
					
				<?php echo get_template_part( 'template-parts/parts/heading', 'divider', array( 'type'=>'white') ); ?>
							
				<h2 class="text-white text-center my-3">From the Trial</h2>
					
			</div>
				
			<div class="featured-box bg-paper" style="background:url(<?php echo $bg_paper; ?>);">
				
				<div class="featured-content-header pt-3 d-none d-md-block">
					
					<?php echo get_template_part( 'template-parts/parts/heading', 'divider', array( 'type'=>'white') ); ?>				
					
					<h2 class="text-center mb-2">From the Trial</h2>
					
				</div>
				
				<div class="featured-content d-flex flex-column h-100 d-md-block align-self-center py-5 py-md-0">
					
					<?php foreach ( $featured_post as $post ): ?>
				
						<?php setup_postdata( $post ); ?>
						
						<div class="align-self-center">
							
							<a class="d-flex d-md-block" href="<?php the_permalink(); ?>"><h3 class="mb-0 mt-md-3 mb-lg-4 text-center text-lg-left align-self-center"><?php the_title(); ?></h3></a>
							
							<div class="d-none d-md-block"><?php the_excerpt(); ?></div>
							
							<div class="text-center text-xl-left mt-3 mt-md-0"><a class="btn-alt" href="<?php the_permalink(); ?>"><img src="<?php the_field('button', 'options'); ?>" width="60px;" /> Read More</a></div>
							
						</div>
										
					<?php endforeach; ?>
					
				</div>
				
			</div>
			
		</div>
		
		<div class="col-md-12 col-lg-10 col-xl-4">
			
			<!-- Login Start -->
			
			<div class="bg-primary p-4 text-white d-none d-xl-block">
				
				<?php if ( !is_user_logged_in( ) ): ?>
								
					<h3 class="text-center text-white">Login/Signup</h3>
														
					<div id="login-register-password">
					
						<ul class="nav nav-tabs" id="login-tabs" role="tablist">
							
							<li class="nav-item">
								
								<a id="login-tab" class="nav-link active" href="#tab1_login" data-toggle="tab" role="tab" aria-controls="tab1_login" aria-selected="true">Login</a>
								
							</li>
							
							<li class="nav-item">
							
								<a id="reset-tab"  class="nav-link" href="#tab2_login" data-toggle="tab" role="tab" aria-controls="tab2_login" aria-selected="false">Reset Password</a>
								
							</li>
						
						</ul>
						
						<div class="tab-content">
						
							<div id="tab1_login" class="tab-pane fade show active" role="tabpanel" aria-labelledby="login-tab">
					
								<?php $login = $_GET['login']; ?>
																
								<?php if ( $login == 'failed' ): ?>
								
									<div class="alert alert-danger p-2 mt-3">
									
									 	<p class="text-sm mb-0">Login Failed. Your Username and Password combination is incorrect.</p>
									
									</div>
																						
								<?php endif; ?>
					
								<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form mt-3">
									
									<div class="username form-group">
									
										<label for="user_login" class="d-none"><?php _e('Username'); ?>: </label>
									
										<input class="form-control" type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" placeholder="Email Address" />
									
									</div>
									
									<div class="password form-group">
									
										<label for="user_pass" class="d-none"><?php _e('Password'); ?>: </label>
									
										<input class="form-control" type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" placeholder="Password" />
									
									</div>
									
									<div class="login_fields">
									
										<div class="rememberme custom-control custom-checkbox mb-3">
									
											<input class="custom-control-input" type="checkbox" name="rememberme" value="forever" id="rememberme" tabindex="13" />
									
											<label class="custom-control-label" for="rememberme">Remember me</label>
									
										</div>
									
										<?php do_action('login_form'); ?>
									
										<div class="d-flex">
									
											<div class="mr-3 flex-fill">
									
												<input type="submit" name="user-submit" value="<?php _e('Login'); ?>" tabindex="14" class="btn btn-white btn-block" />
									
												<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
									
												<input type="hidden" name="user-cookie" value="1" />
									
											</div>
									
											<div class="flex-fill">
									
												<a href="<?php echo home_url('/register/basic'); ?>" class="btn btn-brown btn-block">Sign Up</a>
									
											</div>
											
										</div>
									
									</div>
								
								</form>
							
							</div>
							
							<div id="tab2_login" class="tab_content_login tab-pane fade" role="tabpanel" aria-labelledby="reset-tab">
																								
								<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form mt-3">
								
									<div class="username form-group">
								
										<label for="user_login" class="d-none"><?php _e('Username or Email'); ?>: </label>
								
										<input class="form-control" type="text" name="user_login" value="" size="20" id="user_login" placeholder="Username or Email" tabindex="1001" />
								
									</div>
								
									<div class="login_fields">
								
										<?php do_action('login_form', 'resetpass'); ?>
								
										<input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="btn btn-brown btn-block" tabindex="1002" />
								
										<?php $reset = $_GET['reset']; if($reset == true) { echo '<p>A message will be sent to your email address.</p>'; } ?>
								
										<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
								
										<input type="hidden" name="user-cookie" value="1" />
								
									</div>
								
								</form>
							
							</div>
						
						</div>
					
					</div>
														
				<?php else: ?>
					
					<?php global $current_user; wp_get_current_user(); ?>				
					
					<div class="text-center">
						
						<p class="mb-3 text-sm">Welcome back, <?php echo $current_user->user_login; ?></p>
					
						<a href="<?php echo home_url('/account'); ?>" class="btn btn-white btn-sm">View Account</a>
						
					</div>
											
				<?php endif; ?>
			
			</div>
			
			<!-- Login End -->
			
			<?php if ( get_field('monthly_giveaway', 'options' ) ): $giveaway_id = get_field('monthly_giveaway', 'options'); ?>
			
				<!-- Monthly Giveaway Start -->
			
				<div class="featured-content-header pt-4 d-md-none">
						
					<?php echo get_template_part( 'template-parts/parts/heading', 'divider', array( 'type'=>'white') ); ?>
								
					<h2 class="text-white text-center my-3">Monthly Giveaway</h2>
						
				</div>
				
				<div class="d-none d-xl-block">
				
					<h3 class="text-white text-center my-3">Monthly Giveaway</h3>
					
				</div>
				
				<div id="monthly-giveaway" class="mt-3 w-100" style="background:url( <?php echo $bg_celebrate; ?> );">
					
					<div id="monthly-giveaway-wrap">
											
						<div class="row justify-content-center">
							
							<div class="col-12">
							
								<h2 class="text-center d-none d-md-block d-xl-none mb-3">Monthly Giveaway</h2>
								
							</div>
							
							<div class="col-md-auto col-xl-5 align-self-center d-none d-md-flex">
								
								<?php $image = get_field('featured_image', $giveaway_id); ?>
							
								<a href="<?php the_permalink($giveaway_id); ?>">
									
									<?php echo wp_get_attachment_image( $image['id'], 'thumbnail', false, array( 'class'=>'img-fluid w-100' ) ); ?>
									
								</a>
								
							</div>
							
							<div class="col-md-auto col-xl-7 align-self-center text-center text-md-left">
								
								<div class="my-2">
																	
									<h4><a href="<?php the_permalink($giveaway_id); ?>"><strong><?php echo get_the_title($giveaway_id); ?></strong></a></h4>
									
								</div>
								
								<div class="mt-3 mt-md-0">
									
									<a class="btn-alt" href="<?php the_permalink($giveaway_id); ?>"><img src="<?php the_field('button', 'options'); ?>" /> View</a>
									
								</div>
								
							</div>
							
						</div>
						
					</div>
				
				</div>
				
				<!-- Monthly Giveaway End -->
			
			<?php endif; ?>
			
		</div>
		
	</div>
	
</div>