<?php
if(isset($_GET['page']) && !empty($_GET['page'])){
	if($_GET['page'] == 'reservation'){
		//reservation
		require 'controllers/reservation.php';
	}else{
		//404
		require 'controllers/404.php';
	}
}
else{
	//home
	require 'controllers/home.php';
}
