<?php

$salt_prefixe = 'rjufub4XdGSrBj8JSlh2';
$salt_suffixe = 'WL78vEDqdsfeSLB';

if(isset($_POST['username']) && isset($_POST['password'])){
  $data = json_decode(file_get_contents('data/login.json'));
  $username = hash("sha512", $salt_suffixe.$_POST['username']);
  $password = hash("sha512", $salt_suffixe.$_POST['password'].$salt_prefixe);

  if($username == $data->username && $password == $data->password){
    $_SESSION['username'] = $_POST['username'];
    require 'controllers/home.php';
  }else{
    ob_end_clean();
    $error['login'] = "Mauvais identifiants !";
    require 'views/login.php';
  }
}else{
  session_unset();
  ob_end_clean();
  require 'views/login.php';
}
