<?php

require_once MODELS . "employeeManager.php";



switch ($_SERVER["REQUEST_METHOD"]) {

    case 'GET':
        if (isset($_REQUEST['action']) && isset($_SESSION['userId'])) {
            if (function_exists($_REQUEST['action'])) call_user_func($_REQUEST['action'], $_REQUEST);
        }

        if (isset($_REQUEST['action'])) {
            if ($_REQUEST['action'] == "showEmployee") {
                if (isset($_REQUEST['id'])) $employee = getEmployee($_GET["id"]);
                require_once VIEWS . "employee/employee.php";
            }
        }
        break;
    case 'POST':
        //If the user is created from the employee.php view
        if (isset($_REQUEST['emName'])) {
            $updatedUser = array(
                "employee_ID" => $_REQUEST['emId'],
                "employee_name" => $_REQUEST['emName'],
                "employee_lastName" => $_REQUEST['emLname'],
                "email" => $_REQUEST['emEmail'],
                "gender" => $_REQUEST['emGender'],
                "age" => $_REQUEST['emAge'],
                "streetAddress" => $_REQUEST['emStreet'],
                "city" => $_REQUEST['emCity'],
                "country_state" => $_REQUEST['emState'],
                "postalCode" => $_REQUEST['emPostal'],
                "phoneNumber" => $_REQUEST['emPhone'],
                "photo" => $_REQUEST['emPhoto']
            );
            updateEmployee($updatedUser);
            require_once VIEWS . "dashboard/dashboard.php";
        }

        if (isset($_REQUEST['action'])) {
            if ($_REQUEST['action'] == "select") {
                getEmployees();
            } else if ($_REQUEST['action'] == "addemployee") {
                // if (isset($_POST['newEmployee']))
                $employees = readEmployees();

                $newEmployee = $_REQUEST['newEmployee'];
                // echo $newEmployee;

                $data = addEmployee($newEmployee);
                if ($data) echo json_encode($data);
                else http_response_code(500);
            } else if ($_REQUEST['action'] == "getId") {
                $employees = json_decode(file_get_contents(RESOURCES . 'employees.json'));
                echo getNextIdentifier($employees);
            }
        }

        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);

        if (isset($_DELETE['deleteId'])) {
            $result = deleteEmployee($_DELETE['deleteId']);

            if ($result == "expired") {
                $_SESSION = array();
                session_destroy();
                echo $result;
            }
        }
        break;
}


if (!isset($_SESSION['userId'])) require_once VIEWS . "login/login.php";
