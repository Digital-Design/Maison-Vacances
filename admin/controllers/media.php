<?php

$dossier = '../img/';

function formatSizeUnits($bytes){
  if($bytes >= 1073741824){
    $bytes = number_format($bytes / 1073741824, 2) . ' GB';
  }elseif ($bytes >= 1048576){
    $bytes = number_format($bytes / 1048576, 2) . ' MB';
  }elseif($bytes >= 1024){
    $bytes = number_format($bytes / 1024, 2) . ' KB';
  }elseif($bytes > 1){
    $bytes = $bytes . ' bytes';
  }elseif($bytes == 1){
    $bytes = $bytes . ' byte';
  }else{
    $bytes = '0 bytes';
  }
  return $bytes;
}

if(isset($_FILES['file']) && !empty($_FILES['file'])){
  $fichier = basename($_FILES['file']['name']);

  if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $fichier)){
    $success['edit'] = 'Vos fichiers on été édités !';
  }else{
    $error['edit'] = 'Il y a eu une erreur lors de la modification de vos fichier !';
  }
}

if(isset($_POST['file']) && !empty($_POST['file'])){
  if(is_file($dossier . $_POST['file']) && unlink($dossier . $_POST['file'])){
    $success['edit'] = 'Vos fichiers on été édités !';
  }else{
    $error['edit'] = 'Il y a eu une erreur lors de la modification de vos fichier !';
  }
}

$files = glob('../img/*');
require 'views/media.php';
