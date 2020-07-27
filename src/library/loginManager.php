<?php

function checkEmail($email, $password) {

  $users = json_decode(file_get_contents('../../resources/users.json'))->users;

  foreach($users as $user) {

    if($user->email == $email) {
      if (password_verify($password, $user->password)) {
        
        session_start();
        $_SESSION["userId"] = $user->userId;
        $_SESSION["startTime"] = (new \DateTime())->format('U');

        echo "true";

      } else {
        echo "Incorrect password";
      }
    } else {
      echo "User with such email is not registered";
    }
  
  }

}

