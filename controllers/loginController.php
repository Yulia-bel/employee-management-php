<?php
require MODELS . 'loginManager.php';

if (isset($_POST["name"])) {
  $output = checkUser($_POST["name"], $_POST["password"]);

  if ($output == true) {
    // session_start();
    unset($_POST["name"]);
    unset($_POST["password"]);
    require_once VIEWS . "dashboard/dashboard.php";
  }
} else if (isset($_GET['user'])) {
  require_once VIEWS . "dashboard/dashboard.php";
} else {
  require_once VIEWS . "login/login.php";
}
