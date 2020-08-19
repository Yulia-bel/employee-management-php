<?php
require_once MODELS . 'loginManager.php';

if (isset($_REQUEST["name"])) {
  $output = checkUser($_REQUEST["name"], $_REQUEST["password"]);
  if ($output == true) {
    unset($_REQUEST["name"]);
    unset($_REQUEST["password"]);
    echo "true";
  }
}

if (isset($_REQUEST['action']) && isset($_SESSION['userId'])) {
  if (function_exists($_REQUEST['action'])) call_user_func($_REQUEST['action'], $_REQUEST);
}

if (!isset($_SESSION['userId'])) require_once VIEWS . "login/login.php";
