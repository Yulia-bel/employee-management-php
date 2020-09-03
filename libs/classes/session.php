<?php 

abstract class SessionHelper {
  
  static function checkSession () {
    return isset($_SESSION['log']) ? true : false;
  }

  static function checkSessionTime () {

  }


}