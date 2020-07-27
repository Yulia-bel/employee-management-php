<?php 

require "employeeManager.php";
if($_POST['action'] == "select"){
    getEmployees();
// } else if($_POST['action'] == "update"){
//     updateEmployee();
}

?>