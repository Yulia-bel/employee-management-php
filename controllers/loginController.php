<?php
require MODELS . 'loginManager.php';

if (isset($_POST["name"])) {
  $output = checkUser($_POST["name"], $_POST["password"]);

  if ($output == true) {
    unset($_POST["name"]);
    unset($_POST["password"]);
    echo "true";
  }
}
// else if (isset($_GET['user'])) {
//   // require_once VIEWS . "dashboard/dashboard.php";
//   loadDashboard();
// } 
else {
  require_once VIEWS . "login/login.php";
}

if (isset($_REQUEST['action'])) {
  if (function_exists($_REQUEST['action'])) call_user_func($_REQUEST['action'], $_REQUEST);
  else echo "Error: Function doesnt exist";
} else echo "No action!";
