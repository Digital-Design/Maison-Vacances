<?php
if(isset($_GET['page']) && !empty($_GET['page']) && $_SESSION['username']){
	if($_GET['page'] == 'login'){
		//login
		require 'controllers/login.php';
	}elseif($_GET['page'] == 'logout'){
		//login
		require 'controllers/login.php';
	}elseif($_GET['page'] == 'edit'){
		//edition
		require 'controllers/edit.php';
	}elseif($_GET['page'] == 'parametres'){
		//parameters
		require 'controllers/parameters.php';
	}elseif($_GET['page'] == 'media'){
		//media
		require 'controllers/media.php';
	}else{
		//404
		require 'controllers/404.php';
	}
}
elseif($_SESSION['username']){
	//home
	require 'controllers/home.php';
}
else{
	//login
	require 'controllers/login.php';
}
