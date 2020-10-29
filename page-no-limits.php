<?php 
	
// Template Name: No Limits

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper-sm bg-secondary" id="single-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">
			
			<div class="col-12">

				<h1 class="text-center text-white"><?php the_title(); ?></h1>
				
				<div class="text-sm text-center">
										
					<?php
					
					if ( function_exists('yoast_breadcrumb') ) {
					
						yoast_breadcrumb( '<p id="breadcrumbs" class="mb-0">','</p>' );
					
					}
					
					?>
										
				</div>
			
			</div>
			
		</div>
		
	</div>
	
</div>

<div class="wrapper bg-white" id="single-content-wrapper">
	
	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-xl-10 text-center">	
				
				<h2><?php the_field('no_limits_title', 'options'); ?></h2>
				
				<div class="lead mb-4">
					
					<?php the_field('no_limits_lead_text', 'options'); ?>
					
				</div>
				
			</div>
			
		</div>
				
		<div class="row">
			
			<div class="col-12">
				
				<?php echo get_template_part( 'template-parts/parts/heading', 'divider', array( 'color'=>'dark', 'type'=>'blue') ); ?>
				
			</div>
			
		</div>
		
		<div class="row justify-content-center mt-3">
			
			<?php while( have_rows('no_limits_orgs', 'options') ): the_row(); ?>
			
				<div class="col-sm-6 col-lg-4 col-xl-4 align-self-stretch mb-3">
					
					<div class="bg-light p-3 d-flex h-100 border justify-content-center">
						
						<?php if ( get_sub_field('no_limits_org_logo') ): ?>
						
							<div class="align-self-center mr-3">
								
								<?php echo wp_get_attachment_image( get_sub_field('no_limits_org_logo'), 'Logo', false, array('class'=>'img-fluid') ); ?>
								
							</div>
							
						<?php endif; ?>
						
						<div class="align-self-center">
						
							<strong><?php the_sub_field('no_limits_org_name'); ?></strong>
							
							<?php if ( get_sub_field('no_limits_org_link') ): ?>
							
								<a class="btn btn-primary" href="<?php the_sub_field('no_limits_org_link'); ?>" target="_blank">Learn More</a>
							
							<?php endif; ?>
							
						</div>
						
					</div>
					
				</div>
			
			<?php endwhile; ?>
			
		</div>
							
	</div><!-- #content -->

</div><!-- #single-wrapper -->

<div class="bg-primary wrapper">
	
	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-xl-7">
				
				<h2 class="mb-4 text-center text-white"><?php the_field('no_limits_donation_title', 'options'); ?></h2>
				
				<div class="bg-light p-4">
					
					<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<div class="bg-white wrapper">
	
	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-xl-10 text-center">
				
				<h2><?php the_field('no_limits_supporters_title', 'options'); ?></h2>
				
				<div class="lead mb-3">

					<?php the_field('no_limits_supporters_text', 'options'); ?>
				
				</div>
				
			</div>
			
		</div>
		
		<div class="row">
			
			<div class="col-12">
				
				<?php echo get_template_part( 'template-parts/parts/heading', 'divider', array( 'color'=>'dark', 'type'=>'red') ); ?>
				
			</div>
			
		</div>

		<div class="row justify-content-center mt-3">
			
			<?php while( have_rows('no_limits_supporters', 'options') ): the_row(); ?>
			
				<div class="col-xl-3">
					
					<div class="d-flex">
						
						<div class="mr-3"><img src="https://staging.featherfoottrail.com/wp-content/uploads/2020/08/Left-Foot.svg" width="50" /></div>
						
						<div><strong><?php the_sub_field('supporter_name'); ?></strong></div>
						
					</div>
					
				</div>
				
			<?php endwhile; ?>
			
		</div>
		
	</div>
	
</div>
		
<?php get_footer();
