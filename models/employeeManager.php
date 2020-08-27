<?php

function addEmployee(array $newEmployee)
{
    $employees = readEmployees();
    $newEmployee['employee_id'] = getNextIdentifier($employees);
    array_push($employees, $newEmployee);
    return writeEmployees($employees) ? $newEmployee : false;
}

function writeEmployees($data)
{
    //Here we have to loop through all the database and update all elements
    // $dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE;
    // $pdo = new PDO($dsn, USER, PASSWORD);
    // $employeesObject = $pdo->query("UPDATE  employees")->fetchAll(PDO::FETCH_OBJ);

    $data = json_encode($data, JSON_PRETTY_PRINT);
    $result = file_put_contents(RESOURCES . 'employees.json', $data);
    return is_numeric($result);
}

function readEmployees()
{
    // $data = file_get_contents(RESOURCES . 'employees.json');
    // return json_decode($data);
    $dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE;
    $pdo = new PDO($dsn, USER, PASSWORD);
    $employeesObject = $pdo->query("SELECT * FROM employees")->fetchAll(PDO::FETCH_OBJ);
    return $employeesObject;
}


function deleteEmployee(string $id)
{
    $employees = readEmployees();

    $key = array_search($id, array_column($employees, 'employee_ID'));

    if (!is_numeric($key)) return false;
    array_splice($employees, $key, 1);
    //TODO  is this echo necessary?
    echo "deleted";

    return writeEmployees($employees);
}


function updateEmployee(array $updateEmployee)
{
    $employees = readEmployees();

    $key = array_search($updateEmployee['employee_id'], array_column($employees, 'employee_ID'));
    if (!is_numeric($key)) return false;
    $employees[$key] = $updateEmployee;
    return writeEmployees($employees) ? $employees[$key] : false;
}


function getEmployee(string $id)
{
    $requiredEmployee = null;

    $employees = readEmployees();
    foreach ($employees as $employee) {
        if ($employee->employee_id == $id) {
            $requiredEmployee = $employee;
            $_SESSION['employeeId'] = $employee->employee_id;
            break;
        }
    }
    return $requiredEmployee;
}


function getNextIdentifier(array $employeesCollection): int
{
    $last_id = (int) end($employeesCollection)->employee_id;
    return $last_id + 1;
}

//My functions 

function getEmployees()
{
    // $jsonFile = file_get_contents(RESOURCES . 'employees.json');
    // echo $jsonFile;

    $dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE;
    $pdo = new PDO($dsn, USER, PASSWORD);
    $employeesJSON = json_encode($pdo->query("SELECT * FROM employees")->fetchAll(PDO::FETCH_ASSOC));
    echo $employeesJSON;
}

function showDashboard()
{
    require_once VIEWS . "dashboard/dashboard.php";
}
