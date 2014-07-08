<html>
<head>
	<title><?php echo $title; ?> </title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> 
	 <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<header>
		<!-- LOGO -->
		<p><a href="<?php echo base_url();?>"><img src="images/logo.png" alt= "Wildlife Stories Logo"/></a></p>
		<nav>
			<li><a href="<?php echo base_url();?>">Home</a></li>
			<li><a href="<?php echo base_url('about');?>">About</a></li>
			<li><a href="<?php echo base_url('login');?>">Login</a></li>
		</nav>
	</header>