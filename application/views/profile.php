<div id="profile">
	<section id="aboutinfo">
		<h3>ABOUT</h3>

		<h4>Name</h4>
		<p><?php echo ucfirst($user['f_name']).' '. ucfirst($user['l_name']); ?></p>


		<?php 
		if ( $user['f_animal'] != "" ) { ?>
			<h4>Favorite Animal</h4>
			<p><?php echo $user['f_animal']; ?></p>
		<?php } ?>

		<?php
		if (($user['number_posts'] != "") && ($user['number_posts'] != 0)) { ?>
		<h4>Number of Posts</h4>
		<p>10</p>
		<h4>Ranking</h4>
		<p>Regular</p>
		<?php } ?>
	</section>


		<section id="profile_post">
		<?php
		echo form_open_multipart('profile');
			echo form_error('title');	
			echo form_input('title', $this->input->post('title'), 'placeholder="TITLE"');	
			?>		

			<?php
			echo form_error('post');
			echo form_textarea('post', $this->input->post('post'), 'placeholder="What happened on your last adventure?..."');
			?>

			<?php
			// THE DOCUMENTATION IS HARD TO FOLLOW
			// needs to be handled correctly by controller or add_post()?

			echo form_upload('userfile'); 
			
			echo form_submit('submit', 'SUBMIT');



			echo form_close();
			?>

	</section>

		<section id="upload_form">

		<h3>Upload Profile Image</h3>

		<h4>1. Choose a Photo(.jpg)</h4>

		<h4>2. Upload Your Photo </h4>

		<h4>3. Enjoy Your New Profile Photo </h4>
		<?php
		echo form_open_multipart('profile');	

			echo form_upload('userfile'); 
			
			echo form_submit('upload', 'SUBMIT');

			echo form_close();
			?>

	</section>	

</div>