<?php
require_once MODELS . 'loginManager.php';

if (isset($_POST["name"])) {
  $output = checkUser($_POST["name"], $_POST["password"]);
  if ($output == true) {
    unset($_POST["name"]);
    unset($_POST["password"]);
    echo "true";
  }
}

if (isset($_REQUEST['action']) && isset($_SESSION['userId'])) {
  if (function_exists($_REQUEST['action'])) call_user_func($_REQUEST['action'], $_REQUEST);
}

if (!isset($_SESSION['userId'])) require_once VIEWS . "login/login.php";
