<div class="wrapper-sm bg-light">
			
	<div class="container">
		
		
		<div class="row justify-content-center">
			
			<div class="col-md-10 col-xl-8">		
		
				<?php echo get_template_part( 'template-parts/parts/heading', 'divider', array( 'color'=>'dark', 'type'=>'white' ) ); ?>
		
				<div class="text-center">
			
					<h2><?php the_field('membership_promo_title', 'options'); ?></h2>
					
					<p class="lead mb-5"><?php the_field('membership_promo_sub_title', 'options'); ?></p>
			
				</div>
				
			</div>
			
		</div>
							
		<div class="row justify-content-center">
			
			<div class="col-lg-8 col-xl-6 align-self-center">
		
				<?php echo wp_get_attachment_image( get_field('membership_promo_image', 'options'), 'Full', false, array('class'=>'img-fluid') ); ?>
				
			</div>
			
			<div class="col-lg-12 col-xl-6">
				
				<div class="bg-white shadow p-4 p-md-5 align-self-center">	

					<h3><?php the_field('membership_promo_title_2', 'options'); ?></h3>
					
					<p class="text-sm mt-3 mb-4"><?php the_field('membership_promo_text', 'options'); ?></p>
					
					<div class="row">
						
						<div class="col-md-6 col-xl-12">
							
							<div class="bg-primary p-4 flex-column text-center mb-3">
								
								<p class="text-white"><strong>Monthly Personal Plan</strong></p>
								
								<p class="text-white"><strong>$9.95/month</strong></p>
								
								<a href="<?php echo home_url(); ?>/register/basic" class="btn btn-primary btn-white">Sign Up Now</a>
								
							</div>
							
						</div>
					
						<div class="col-md-6 col-xl-12">
					
							<div class="bg-brown p-4 flex-column text-center">
								
								<p class="text-white"><strong>Monthly Classroom Plan</strong></p>
								
								<p class="text-white"><strong>$14.95/month</strong></p>
								
								<a href="<?php echo home_url(); ?>/register/classroom" class="btn btn-primary btn-white">Sign Up Now</a>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>	