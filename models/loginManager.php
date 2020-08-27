<?php

function checkUser($username, $password)
{
  // $users = json_decode(file_get_contents(RESOURCES . 'users.json'))->users;
  $dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE;
  $pdo = new PDO($dsn, USER, PASSWORD);
  $usersObject = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_OBJ);

  $found = false;

  foreach ($usersObject as $user) {
    if ($user->user_name == $username) {
      if (password_verify($password, $user->user_password)) {
        $_SESSION["userId"] = $user->user_ID;
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
