<?php
require 'loginManager.php';

if (isset($_POST["name"])) {

  $output = checkUser($_POST["name"], $_POST["password"]);

  if ($output == "true") {
    session_start();
  }
  echo $output;
}
