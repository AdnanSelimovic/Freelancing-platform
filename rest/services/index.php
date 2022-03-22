<<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './../../vendor/autoload.php';

Flight::route('/', function(){
  echo "hello world";
});

Flight::route('/tin/@name', function($name){
  echo "hello world TIN!". $name;
});

Flight::start();

?>
