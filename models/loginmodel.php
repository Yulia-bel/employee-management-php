<?php

class LoginModel extends Model {
  
  public function __construct() {
    parent::__construct();
  }

  public function checkUser($email)
  {
       $conn = $this->db->connect();;
       $query = "SELECT * FROM user WHERE email='$email' LIMIT 1;";
       $stmt = $conn->prepare($query);
       $stmt->execute();
    
       if ($stmt->rowCount()) {
          $result = $stmt->fetch(PDO::FETCH_OBJ);
          return $result;
       } else {
          return false;
     }
  }
}


