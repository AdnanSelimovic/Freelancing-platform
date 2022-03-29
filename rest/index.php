<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'dao/FreelancingDao.class.php';
require_once '../vendor/autoload.php';

Flight::register('freelancingDao', 'FreelancingDao');



// CRUD Operations for freelancing entity

// List all freelancingapps
Flight::route('GET /freelancingapps', function(){
  Flight::json(Flight::freelancingDao()->get_all());
});

// List invdividual freelancingapps
Flight::route('GET /freelancingapps/@id', function($id){
  Flight::json(Flight::freelancingDao()->get_by_id($id));
});

// add freelancingapp
Flight::route('POST /freelancingapps', function(){
  Flight::json(Flight::freelancingDao()->add(Flight::request()->data->getData()));
});

// update freelancingapp
Flight::route('PUT /freelancingapps/@id', function($id){
  $data = Flight::request()->data->getData();
  $data['id'] = $id;
  FLight::freelancingDao()->update($data); 
  Flight::json($data);
});

// delete freelancingapp
Flight::route('DELETE /freelancingapps/@id', function($id){
  Flight::freelancingDao()->delete($id);
  Flight::json(["message" => "deleted"]);
});

Flight::start();

?>
