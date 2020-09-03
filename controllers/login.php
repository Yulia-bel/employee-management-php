<?php

class Login extends Controller {
  function __construct(){
      parent::__construct();
    }

  public function enter() {
    session_unset();
    $this->view->render('login/login');
  }

  public function validate() {

    $user = $this->model->checkUser($_POST["email"]);

    if($user) {
      if(password_verify($_POST['password'], $user->password)) {
        $_SESSION['log'] = true;
        $_SESSION['user'] = $user->id;
        $_SESSION['start'] = time();
        echo "true";     
      } else {
        echo "false";
      }
    } else {
      echo "notfound";
    }
  }  
}





