<?php
$slider = json_decode(file_get_contents('data/slider.json'));
$maison = json_decode(file_get_contents('data/maison.json'));
$alentours = json_decode(file_get_contents('data/alentours.json'));

require 'views/home.php';
