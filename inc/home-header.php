<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="SDG Tracker" />
	<meta name="author" content="Open Institute" />

	<title>
		<?php if(isset($homeTitle)){
			echo $homeTitle;
			} else{
				echo "SGD Trackers | Home";
			}
			?>
	</title>

	<link rel="stylesheet" href="home-assets/css/bootstrap.css">
	<link rel="stylesheet" href="home-assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="home-assets/css/neon.css">

	<script src="home-assets/js/jquery-1.11.0.min.js"></script>
	<script>$.noConflict();</script>
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<!--[if lt IE 9]><script src="home-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body>
