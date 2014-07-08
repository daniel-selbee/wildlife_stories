

	<!-- CTA -->
	<section id="CTA">
	<h1><?php echo $pageTitle ?></h1>

	<section class="signup_form">
		<?php
		echo form_open('/');

		// echo validation_errors();

		echo "<p>";
		echo form_input('f_name', '', 'placeholder="FIRST NAME"');
		echo form_input('l_name', '', 'placeholder="LAST NAME"');
		echo "</p>";
		
		//FORM ERROR EXAMPLE BELOW
		echo "<p>";
		echo form_error('email');
		echo form_input('email', $this->input->post('email'), 'placeholder="EMAIL"');
		echo "</p>";

		echo "<p>";
		echo form_error('password');
		echo form_password('password', '', 'placeholder="PASSWORD"');
		echo "</p>";

		echo "<p>";
		echo form_error('cpassword');
		echo form_password('cpassword', '', 'placeholder="RE-ENTER PASSWORD"');	
		echo "</p>";

		// FAVORITE ANIMALS
		$options = array(
	 				'Choose Animal' => 'CHOOSE FAVORITE ANIMAL',
	 				'Polar Bear' => 'POLAR BEAR',
	  				'Jaguar' => 'JAGUAR',
	   				'Dolphin' => 'DOLPHIN',
	    			'Elephant' => 'ELEPHANT',
	    			'Tiger' => 'TIGER'
	                );

		echo form_dropdown('f_animal', $options);
		// END ANIMALS

		echo form_submit('signup_submit', 'SUBMIT');

		echo form_close();

		?>
	</section>
</section>
	<p id="clearfix"></p>
	<!-- FEATURED STORIES -->
	<section id="Featured">
		<!-- 1st column -->
		<article>
			<p><img src="images/grey_crowned_portrait.jpg"></p>
			<p>As most of the readers in the Wildlife Stories community know that I took a trip out to
				Africa last year, which definitely happen to be a life changing trip.
				<a href="<?php echo base_url('featured_one');?>">Read More</a>
			</p>
			
		</article>
		
		<!-- 2nd column -->
		<article>
			<p><img src="images/red_robin.jpg"></p>
			<p>
				Earlier today I took my kids out to the park to have a picnic, then we were going to go for
				a walk around the lake, which is not very far from the park. 
				<a href="<?php echo base_url('featured_two');?>">Read More</a>
			</p>
			
		</article>
		
		<!-- 3rd column -->
		<article>
			<p><img src="images/rabbit_on_stairs.jpg"></p>
			<p>
				During May long weekend, my family and I took a trip up to Whistler in British Columbia,

				Canada. We spent the first part of the day driving up there from Seattle, Washington.
				<a href="<?php echo base_url('featured_three');?>">Read More</a>
			</p>
			
		</article>

	</section>

		<h2 id="share">SHARE YOUR STORY WITH US!</h2>
	
