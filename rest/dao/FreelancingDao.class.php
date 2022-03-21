<?php

class FreelancingDao{

  private $conn;

  // constructor of dao class
  public function __construct(){

    $servername = "localhost";
    $username = "FreelancingApp";
    $password = "FreelancingApp";
    $schema = "FreelancingApp";

    $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }

  // Method used to real all Freelancing objects from database
  public function get_all(){
    $stmt = $this->conn->prepare("SELECT * FROM freelancingapps");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }

  // Method used to add Freelancing objects to the database
  public function add($description, $created){
    $stmt = $this->conn->prepare("INSERT INTO freelancingapps (description, created) VALUES ('$description', '$created')");
    $stmt->execute();
  }

  // Delete freelancingapps record from the SQLiteDatabase
  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM freelancingapps where id=$id");
    $stmt->execute();
  }

}

?>
