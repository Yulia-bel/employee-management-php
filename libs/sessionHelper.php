<?php

include_once(MODELS . 'loginManager.php');

session_start();

if ($_GET["action"] = "logout") {
  logout();
}


if (!activeSession() && isset($_GET['action'])) header('Location: index.php');
else if (sessionTimeout()) logout();

function activeSession()
{
  return isset($_SESSION['username']);
}

function sessionTimeout()
{
  return time() - $_SESSION['startTime'] > $_SESSION['lifeTime'];
}
