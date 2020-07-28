<?php 

require "employeeManager.php";

if(isset($_POST['action'])){
    if($_POST['action'] == "select"){
        getEmployees();

    }    if($_POST['action']=="addemployee") {
        $newName = $_POST['name'];
        $newEmail = $_POST['email'];
        $newAge = $_POST['age'];
        $newStreet = $_POST['street'];
        $newCity = $_POST['city'];
        $newState = $_POST['state'];
        $newPostal = $_POST['postal'];
        $newPhone = $_POST['phone'];

        // save other variables recieved from js
        $newUserArray = array("id"=>"", "name"=>$newName, "lastName"=>"", "email"=>$newEmail, "gender"=>"","age"=>$newAge, "city"=>$newCity, "sreetAddress"=>$newStreet, "state"=>$newState, "postalCode"=>$newPostal, "phoneNumber"=>$newPhone);

        addEmployee($newUserArray);
    }
}
?>