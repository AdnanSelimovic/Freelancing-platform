<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'dao/FreelancingDao.class.php';
require_once '../vendor/autoload.php';


// CRUD Operations for freelancing entity

// List all freelancingapps
Flight::route('GET /freelancingapps', function(){
  $dao = new FreelancingDao();
  $freelancingapps = $dao->get_all();
  Flight::json($freelancingapps);
});

// List invdividual freelancingapps
Flight::route('GET /freelancingapps/@id', function($id){
  $dao = new FreelancingDao();
  $freelancingapps = $dao->get_by_id($id);
  Flight::json($freelancingapps);
});

// add freelancingapp
Flight::route('POST /freelancingapps', function(){
  $dao = new FreelancingDao();
  $request = Flight::request();
  print_r($request);
  // print_r($request->data->getData());
  // Flight::json($freelancingapps);
});

// update freelancingapp

// delete freelancingapp

Flight::start();

?>
