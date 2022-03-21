<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "FreelancingApp";
$password = "FreelancingApp";
$schema = "FreelancingApp";

$description = $_REQUEST['description'];


try {
  $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn->prepare("INSERT INTO freelancingapps (description, created) VALUES ('$description', '2022-03-14 12:00:00') ");
$result = $stmt->execute();
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($result);

?>
