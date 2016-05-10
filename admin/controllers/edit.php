<?php

if($file = glob('../data/'.$_GET['params'].'.json')[0]) {
  $data = file_get_contents($file);
  $data = json_decode($data);
  if(isset($_POST[item]) && !empty($_POST[item])){

    foreach ($_POST[item] as $key => $item) {
      if(isset($data[$key]) && !array_filter((array)$data[$key])){
        unset($data[$key]);
      }else{
        $data[$key] = new stdClass();
        foreach ($item as $params => $value) {
          if(is_array($value))
            $value = array_filter($value);
          $data[$key]->$params = $value;
        }
      }
    }
    if(file_put_contents($file, json_encode($data))){
      $success['edit'] = 'Vos paramètres on été édités !';
    }else{
      $error['edit'] = 'Il y a eu une erreur lors de l\'édition !';
    }
  }
  require 'views/edit.php';
}else{
  require 'views/404.php';
}
