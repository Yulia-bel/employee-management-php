<?php 

require "employeeManager.php";

if(isset($_POST['action'])){
    if($_POST['action'] == "select"){
        getEmployees();

    }

}
?>