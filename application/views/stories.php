
	<section id="stories_post">
		<?php
		echo form_open_multipart('stories');
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

			echo form_upload('userfile'); //do I need to echo this??
			


			echo form_submit('submit', 'SUBMIT');



			echo form_close();
			?>
	</section>

	<section id="latest">
		<h2>Latest</h2>
		<!-- THIS SECTION WILL ITERATE THROUGH ALL OF THE POSTS AND DISPLAY THEM HERE -->
		<!-- <article><p><a href="<?php //echo base_url('story'); ?>"><img src="images/lateststory.png"></a></p></article> -->
		<!-- <article><p><a href="<?php //echo base_url('story'); ?>"><img src="images/lateststory.png"></a></p></article> -->
		<?php
		foreach($stories as $story){
		
			$story = Model_blog::get_post($story['id']);
		?>
			<article>
					<a href="<?php echo base_url('story/' . $story->id); ?>" >
					<p>
					<?php
					echo $story->title . "<br>";
					echo $story->get_author();
					?>
					</p>
					</a>	
			</article>
		<?php	
		}
		?>
	</section>