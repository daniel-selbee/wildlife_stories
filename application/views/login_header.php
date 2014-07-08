<html>
<head>
	<title><?php echo $title ?> </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css'); ?>">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<header id="logged_in">
		<!-- LOGO -->
		<p><a href="<?php echo base_url();?>"><img src="<?php echo base_url('images/logo.png'); ?>" alt= "Wildlife Stories Logo"/></a></p>
		<nav>
			<ul>
				<li><a href="<?php echo base_url('profile');?>">Profile</a></li>
				<li><a href="<?php echo base_url('stories');?>">Stories</a></li>
				<li><a href="<?php echo base_url() . "main/logout"; ?>">Logout</a></li>
			</ul>
		</nav>
	</header>
	<!-- THE ID ISN'T BEING OVERWRITTEN BY THE CLASS -->

	<section id="CTA" class="<?php echo str_replace(' ', '', $user['f_animal']); ?>">

	<?php
		if($pageTitle == "Story Name"){ 
	?>
			<h1><?php echo $story->title;?></h1>
		
		<?php
		}else if($pageTitle == "Congrats on Your New Story!"){
		?>
			<h1><?php echo $pageTitle; ?>
				<a href="<?php echo base_url('story/'. $new_story_id); ?>"><button>View it here</button></a>
			</h1>
		<?php 
		}else { 
		?>
			<h1><?php echo $pageTitle ?></h1>
		<?php 
		} 
		?>

		<a href="#about_info">
			<p id="profilephoto">
				<?php
				if(file_exists("./profile_images/" . $user['l_name'] . ".jpg")){
				
				echo '<img src="' . base_url('profile_images/' . $user['l_name'] . '.jpg') . '" />' ;

				} ?>
			</p>
		</a>

	</section>