

	<!-- CTA -->
	<section id="CTA">
	<h1><?php echo $pageTitle ?></h1>

		<?php
		echo form_open('/login');

		//echo validation_errors();

		echo "<p>";
		echo form_input('email', $this->input->post('email'), 'placeholder="EMAIL"');
		echo form_error('email');
		echo "</p>";

		echo "<p>";
		echo form_password('password', '', 'placeholder="PASSWORD"');
		echo form_error('password');
		echo "</p>";

		echo "<p>";
		echo form_submit('login_submit', 'SUBMIT');
		echo "</p>";

		echo form_close();
		?>


	</section>
	<p id="clearfix"></p>
	<!-- FEATURED STORIES -->
	<section id="Featured">
		<!-- 1st column -->
		<article>
			<p><img src="images/AboutRead.png"></p>
			<p>Read stories written about wildlife from other bloggers. Maybe they will inspire 
				you to write your own.
			</p>

		</article>
		
		<!-- 2nd column -->
		<article>
			<p><img src="images/AboutWrite.png"></p>
			<p>Take your new inspiration to the keyboard. Tell everyone about your close encounter with
				a bear, or the serenity you get from bird watching.</p>

		</article>
		
		<!-- 3rd column -->
		<article>
			<p><img src="images/AboutUpload.png"></p>
			<p>Sometimes writing isn't enough. People need visuals. Show off your photos and tell
				the stories behind them.</p>

		</article>

	</section>

		<h2>SHARE YOUR STORY WITH US!</h2>
	