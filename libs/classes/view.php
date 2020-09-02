<?php

class View {

    function __construct(){
        //echo "<br><p> New View</p> <br>";
    }

    function render($name) {
      require "views/" . $name . ".php";
    }
}

?>