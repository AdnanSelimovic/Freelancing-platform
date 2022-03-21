<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("rest\dao\FreelancingDao.class.php");

$dao = new FreelancingDao();
$results = $dao->get_all();
print_r($results);


?>
