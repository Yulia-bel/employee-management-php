<?php 

require "employeeManager.php";

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        if(isset($_GET['action']))  {
            if ($_GET['action'] == "show") {
               $output = getEmployee($_GET["id"]);
                echo json_encode($output); 
            }            
        }
    break;

    case 'POST':
        if(isset($_POST['emName']))  {
            $updatedUser = array(
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
            updateEmployee($updatedUser);
            header("Location: ../dashboard.php?user_changed=true");   
        }

        if(isset($_POST['action'])){
            
            if($_POST['action'] == "select"){
                getEmployees();
            }
            if($_POST['action']=="addemployee") {
                if(isset($_POST['newEmployee']))

                $employees = json_decode(file_get_contents(__DIR__.'/../../resources/employees.json'));

                $newEmployee = $_POST['newEmployee']; 
                $newEmployee["id"] = getNextIdentifier($employees);
                $newEmployee["lastName"] = "";

                addEmployee($newEmployee);
              }

            if($_POST['action'] == "getId") {
                $employees = json_decode(file_get_contents(__DIR__.'/../../resources/employees.json'));
                echo getNextIdentifier($employees);
              }
            }
        break;

        case 'DELETE': 
            parse_str(file_get_contents("php://input"), $_DELETE);

            if(isset($_DELETE['deleteId'])) {
            $result = deleteEmployee($_DELETE['deleteId']);

                if($result == "expired") {
                    $_SESSION = array();
                    session_destroy();
                    echo $result;
                } 
            }
        break;
    }
?>