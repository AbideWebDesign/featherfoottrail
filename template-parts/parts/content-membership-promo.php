<div class="wrapper-sm bg-light">
			
	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-12">		
				
				<?php echo get_template_part( 'template-parts/parts/heading', 'divider', array( 'color'=>'dark', 'type'=>'white' ) ); ?>
		
				<div class="text-center">
			
					<h2><?php the_field('membership_promo_title', 'options'); ?></h2>
					
					<p class="lead mb-5"><?php the_field('membership_promo_sub_title', 'options'); ?></p>
			
				</div>
									
				<div class="d-flex justify-content-between">
					
					<div class="mr-5">
				
						<img src="<?php echo home_url(); ?>/wp-content/uploads/2020/08/fft_mockup.png" class="img-fluid" />
						
					</div>
					
					<div class="bg-white shadow p-5 align-self-center">	

						<h3><?php the_field('membership_promo_title_2', 'options'); ?></h3>
						
						<p class="text-sm"><?php the_field('membership_promo_text', 'options'); ?></p>
						
						<div class="bg-primary p-4 flex-column text-center mb-3">
							
							<p class="text-white"><strong>Monthly Personal Plan</strong></p>
							
							<p class="text-white"><strong>$9.95/month</strong></p>
							
							<a href="<?php echo home_url(); ?>/register/basic" class="btn btn-primary btn-white">Sign Up Now</a>
							
						</div>
						
						<div class="bg-primary p-4 flex-column text-center">
							
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