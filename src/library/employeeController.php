<?php 

require "employeeManager.php";



if(isset($_GET['action']))  {

    if ($_GET['action'] == "show") {
       $output = getEmployee($_GET["id"]);
        echo json_encode($output); 
    }
    
}

if(isset($_POST['emName']))  {

    $newUser = array(
        "id" => $_POST['emId'],
        "name" => $_POST['emName'], 
        "lastName" => $_POST['emLname'], 
        "email" => $_POST['emEmail'], 
        "gender" => $_POST['emGender'], 
        "age" => $_POST['emAge'], 
        "streetAddress" => $_POST['emStreet'], 
        "city" => $_POST['emCity'], 
        "state" => $_POST['emState'], 
        "postalCode" => $_POST['emPostal'], 
        "phoneNumber" => $_POST['emPhone'],
        "photo"=>$_POST['emPhoto']
    );
        

    updateEmployee($newUser);
    header("Location: ../dashboard.php?user_changed=true");
    
}

if(isset($_POST['deleteId'])) {

    $result = deleteEmployee($_POST['deleteId']);

    if($result == "expired") {
        $_SESSION = array();
        session_destroy();
        echo $result;
    }
}

if(isset($_POST['action'])){
    if($_POST['action'] == "select"){
        getEmployees();

    }    
    
    if($_POST['action']=="addemployee") {
        $newId = $_POST['id'];
        $newName = $_POST['name'];
        $newEmail = $_POST['email'];
        $newAge = $_POST['age'];
        $newStreet = $_POST['street'];
        $newCity = $_POST['city'];
        $newState = $_POST['state'];
        $newPostal = $_POST['postal'];
        $newPhone = $_POST['phone'];

        // save other variables recieved from js
        $newUserArray = array("id"=>$newId, "name"=>$newName, "lastName"=>"", "email"=>$newEmail, "gender"=>"","age"=>$newAge, "city"=>$newCity, "streetAddress"=>$newStreet, "state"=>$newState, "postalCode"=>$newPostal, "phoneNumber"=>$newPhone);

        addEmployee($newUserArray);
    }
}
?>