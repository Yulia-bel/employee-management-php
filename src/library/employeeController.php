<?php 

require "employeeManager.php";



if(isset($_POST['action'])) {
    if($_POST['action'] == "select"){
        getEmployees();
    // } else if($_POST['action'] == "update"){
    //     updateEmployee();
    }

}


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
        "phoneNumber" => $_POST['emPhone']);

    updateEmployee($newUser);
    header("Location: ../dashboard.php?user_changed=true");
    
}



if(isset($_POST['deleteId'])) {

    $result = deleteEmployee($_POST['deleteId']);

    if($result == "expired") {
        $_SESSION = array();
        session_destroy();
    }

}



?>