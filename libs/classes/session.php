<?php 

abstract class SessionHelper {
  
  static function checkSession () {
    return isset($_SESSION['log']) ? true : false;
  }

  static function sessionExpired () {
    return (time() - $_SESSION['start'] > 600) ? true : false;
  }

}