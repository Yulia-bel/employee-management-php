<?php

session_start();

//We check if we try to do some action but session is not active
if (!activeSession() && isset($_REQUEST['action'])) header('Location: index.php');
// else if (sessionTimeout()) logout();

//if we logged out
if (isset($_REQUEST['logout'])) {
  echo "<script type='text/javascript'>alert('Your session expired!');</script>";
  logout();
}


function activeSession()
{
  return isset($_SESSION['userId']);
}

function sessionTimeout()
{
  if (isset($_SESSION['startTime'])) return time() - $_SESSION['startTime'] > $_SESSION['lifeTime'];
  else return false;
}

function logOut()
{
  $_SESSION = array();
  session_destroy();
  header('Location: index.php');
}
