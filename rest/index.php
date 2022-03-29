<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'dao/FreelancingDao.class.php';
require_once '../vendor/autoload.php';


// CRUD Operations for freelancing entity

// List all freelancingapps
Flight::route('/freelancingapps', function(){
  $dao = new FreelancingDao();
  $freelancingapps = $dao->get_all();
  Flight::json($freelancingapps);
});

// List invdividual freelancingapps

// add freelancingapp

// update freelancingapp

// delete freelancingapp
Flight::route('/', function(){
});

Flight::route('/adnan/@name', function($name){
  echo "hello ". $name;
});

Flight::route('/adna', function(){
  echo "hello adna";
});

Flight::route('/stara', function(){
  echo "hello stara";
});


Flight::start();

?>
