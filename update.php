<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("rest\dao\FreelancingDao.class.php");

$id = $_REQUEST['id'];
$description = $_REQUEST['description'];
$created = $_REQUEST['created'];

$dao = new FreelancingDao();
$results = $dao->update($id, $description, $created);

echo "UPDATED $id";

?>
