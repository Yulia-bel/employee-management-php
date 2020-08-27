<?php

function checkUser($username, $password)
{
  // $users = json_decode(file_get_contents(RESOURCES . 'users.json'))->users;
  $dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE;
  $pdo = new PDO($dsn, USER, PASSWORD);
  $users = $pdo->query("SELECT * FROM users");

  $found = false;

  foreach ($users as $user) {
    if ($user->name == $username) {
      if (password_verify($password, $user->password)) {
        $_SESSION["userId"] = $user->userId;
        $_SESSION["startTime"] = time();
        $_SESSION['lifeTime'] = 600;
        $found = true;
      }
    }
  }
  return $found;
}

function loadDashboard()
{
  require_once VIEWS . "dashboard/dashboard.php";
}
