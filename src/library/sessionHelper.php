<?php


if(isset($_GET["action"])|| $_GET["action"]="logout") {
  session_start();
  $_SESSION = array();
  session_destroy();

  echo "success";
}