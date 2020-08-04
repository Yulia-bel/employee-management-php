<?php
require MODELS . 'loginManager.php';

if (isset($_POST["name"])) {
  $output = checkUser($_POST["name"], $_POST["password"]);
  unset($_POST["name"]);
  unset($_POST["password"]);

  if ($output == true) {
    // session_start();
    require_once VIEWS . "dashboard/dashboard.php";
  }
  // echo $output;
} else if (isset($_GET['user'])) {
  require_once VIEWS . "dashboard/dashboard.php";
} else {
  require_once VIEWS . "login/login.php";
}
