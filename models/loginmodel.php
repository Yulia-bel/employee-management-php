<?php

class LoginModel extends Model {
  
  public function __construct() {
    parent::__construct();
  }

  public function checkUser($email, $password)
  {

       $conn = $this->db->connect();;
       $query = "SELECT * FROM user WHERE email='$email' LIMIT 1;";
       $stmt = $conn->prepare($query);
       $stmt->execute();
    
       if ($stmt->rowCount()) {
          $result = $stmt->fetch(PDO::FETCH_OBJ);
          if (password_verify($password, $result->password)) {
             $_SESSION['logged'] = true;
             $_SESSION['userId'] = $user->userId;
             $_SESSION['username'] = $user->name;
             $_SESSION['email'] = $user->email;
             $_SESSION['logTime'] = time();
             return true;
          } else {
             $_SESSION['wrong-pwd'] = true;
             if (isset($_SESSION['wrong-email'])) unset($_SESSION['wrong-email']);
             return false;
          }
       } 

  }

}


