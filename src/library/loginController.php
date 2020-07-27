<?php
  require 'loginManager.php';

  if (isset($_POST["email"])) {

    $output = checkEmail($_POST["email"], $_POST["password"]);

    if ($output == "true") {
      session_start();

    }
    echo $output;
  }