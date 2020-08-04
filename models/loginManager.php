<?php

function checkUser($username, $password)
{

  $users = json_decode(file_get_contents(RESOURCES . 'users.json'))->users;
  $found = false;

  foreach ($users as $user) {

    if ($user->name == $username) {
      if (password_verify($password, $user->password)) {

        session_start();
        $_SESSION["userId"] = $user->userId;
        $_SESSION["startTime"] = time();
        $_SESSION['lifeTime'] = 600;

        $found = true;
      }
    }
  }
  return $found;
}

function logOut()
{
  $_SESSION = array();
  session_destroy();
  header('Location: ../index.php');
}
