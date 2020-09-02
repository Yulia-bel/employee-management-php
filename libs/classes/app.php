<?php

require_once('controllers/error.php');


class App 
{
  function __construct(){

    // getting url and transorming it to array though "/" division

      $url = isset($_GET['url']) ? $_GET['url']: null;
      $url = rtrim($url, '/');
      $url = explode('/', $url);

      // in case controller is not defined
      if(empty($url[0])){
          $controllerFile = 'controllers/main.php';
          /*require_once $controllerFile;
          $controller = new Main();
          $controller->loadModel('main');
          $controller->render();*/
          echo $controllerFile;
          return false;
      }

      // if controller is defined in url we require the file from Controllers folder

      $controllerFile = 'controllers/' . $url[0] . '.php';

      if(file_exists($controllerFile)){

          require_once $controllerFile;

          // creating object from controller file to load the necesarry Model
          $controller = new $url[0];
          //$controller->loadModel($url[0]);
          
          // checking for other parameters in url array
          $numberOfparam = sizeof($url);

          if($numberOfparam > 1){

            // if $numberOfparam > 2 - the methos has parameters and we are calling the methos with paratmeter
              if($numberOfparam > 2){ 
                  $param = [];
                  for($i = 2; $i<$numberOfparam; $i++){
                      array_push($param, $url[$i]);
                  }

                  //print_r ($param);
                  $controller->{$url[1]}($param);
              
              // else - $numberOfparam = 2, the method has no parameters and we are calling methos without parameter
              }else{
                  $controller->{$url[1]}();
                  //print_r($url[1]);
              }
          }else{
              //$controller->render();
              //print_r($controller);
          }
      }else{
          $controller = new Errorr();
      }
  }
}