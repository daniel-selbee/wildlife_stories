
	<section id="story">
	<article>
		<!-- DEALS WITH IMAGE -->
	<h5 id="story_image">	
	<?php
	if(file_exists("./uploads/" . $story->id . ".jpg")){
	?>
		
		<?php
		echo "<img src=\"" . base_url('uploads') . "/" . $story->id . ".jpg\"";
		?>
		</h5>
		<?php
	}else{
		//do nothing
	}
	?>
	<p><?php echo $story->post; ?></p>
	<p id="story_author">
		<?php
		echo "- " . $story->get_author() . " ";
		echo $story->date; 
		?>
		</p>
	</article>
</section>



