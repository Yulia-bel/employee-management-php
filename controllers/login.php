<?php

class Login extends Controller {
  function __construct(){
      parent::__construct();
    }

  public function enter() {
    $this->view->render('login/login');
  }

  public function logIn() {

    $result = $this->model->checkUser($_POST["email"], $_POST["password"]);

    echo $result;
  }
  
}





