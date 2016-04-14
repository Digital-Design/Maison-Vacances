<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Maison de Vacances</title>
	<meta name="description" content="Nous louons notre maison de vacances.
	Vous trouverez sur ce site plusieurs informations sur la maison, un formulaire de contact et de réservation et des photos de celle-ci." />
	<meta name="keywords" content="maison, vacances, reservation, pors-poulhan, pors, poulhan, finistère, pays, bigoudin, mer, plage, pors, grouen, porsgrouen, maisondevacancesbaiedaudierne, baie, audierne, location" />
	<link rel="icon" type="image/png" href="img/vague_bleu.png" />
	<meta name="viewport" content="width=device-width, initial-scale=0.7">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/main.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
	<script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body id="categorie-top">

	<!-- Nav -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#categorie-top">
					<img alt="Brand" src="img/vague_blanc.png" height="25px">
				</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left">
					<li class="nav-link"><a href="./#categorie-maison">La Maison</a></li>
					<li class="nav-link"><a href="./#categorie-alentours">Les Alentours</a></li>
					<li class="nav-link"><a href="./#categorie-contact">Nous Contacter</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-link"><a href="reservation"><i class="fa fa-calendar-plus-o"></i> Réserver</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<br/><br/>

	<!-- ajout de vues -->
	<?php require 'router.php' ?>

	<!-- google map -->
	<div id="map"></div>

	<!-- Footer -->
	<footer>
		<ul>
			<li class="pull-right" style="margin-top: 10px;"><a href="http://isenclub.fr/digitaldesign/" style="color:white;" target="_blank"><img src="http://isenclub.fr/digitaldesign/img/favicon.png" alt="logo" width="40">Création Digital Design</a></li>
		</ul>
	</footer>
</body>
</html>
