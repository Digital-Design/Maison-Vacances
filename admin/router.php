<?php
if(isset($_GET['page']) && !empty($_GET['page'])){
	if($_GET['page'] == 'edit'){
		//edition
		require 'controllers/edit.php';
	}elseif($_GET['page'] == 'parametres'){
		//parameters
		require 'controllers/parameters.php';
	}else{
		//404
		require 'controllers/404.php';
	}
}
else{
	//home
	require 'controllers/home.php';
}
