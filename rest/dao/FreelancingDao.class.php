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

  public function get_by_id($id){
    $stmt = $this->conn->prepare("SELECT * FROM freelancingapps WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return reset($result);
  }

  // Method used to add Freelancing objects to the database
  public function add($freelancing){
    $stmt = $this->conn->prepare("INSERT INTO freelancingapps (description, created) VALUES (:description, :created)");
    $stmt->execute($freelancing);
    $freelancing['id'] = $this->conn->lastInsertId();
    return $freelancing;
  }

  // Delete freelancingapps record from the SQLiteDatabase
  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM freelancingapps where id=:id");
    $stmt->bindParam(':id', $id); //SQL injection prevention
    $stmt->execute();
  }

  // Update freelancingapps record
  public function update($freelancing){
    $stmt = $this->conn->prepare("UPDATE freelancingapps SET description=:description, created=:created WHERE id=:id");
    $stmt->execute($freelancing);
    return $freelancing;
  }

}

?>
