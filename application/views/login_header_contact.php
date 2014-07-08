<html>
<head>
	<title><?php echo $title ?> </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css'); ?>">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
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