<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

Flight::route('/', function(){
  echo 'Hello world';
});

Flight::start();

$servername = "localhost";
$username = "FreelancingApp";
$password = "FreelancingApp";
$schema = "FreelancingApp";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn->prepare("SELECT * FROM freelancingapps");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);

?>
