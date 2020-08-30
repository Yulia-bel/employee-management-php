<?php

function addEmployee(array $newEmployee)
{
    $employees = readEmployees();
    $newEmployee['employee_id'] = getNextIdentifier($employees);
    $pdo = SQLConnect();

    $sql = "INSERT INTO employees";
    $sql .= "(" . implode(', ', array_keys($newEmployee)) . ")";
    $sql .= " VALUES ";
    $sql .= "('" . implode("', '", $newEmployee) . "');";
    $numberLines = $pdo->query($sql);
    return is_numeric($numberLines) ? $newEmployee : false;
}

function readEmployees()
{
    $pdo = SQLConnect();
    $employeesObject = $pdo->query("SELECT * FROM employees")->fetchAll(PDO::FETCH_OBJ);
    return $employeesObject;
}


function deleteEmployee(string $id)
{
    $employees = readEmployees();

    $key = array_search($id, array_column($employees, 'employee_ID'));

    $sql = "DELETE FROM employees WHERE employee_ID = $id;";

    $pdo = SQLConnect();
    $numberLines = $pdo->query($sql);
    return is_numeric($numberLines);
}


function updateEmployee(array $updateEmployee)
{
    $employees = readEmployees();

    $key = array_search($updateEmployee['employee_ID'], array_column($employees, 'employee_ID'));
    if (!is_numeric($key)) return false;
    $id = $employees[$key]['employee_ID'];
    $sql = " UPDATE employees ";
    $sql .= " SET " . implode(", ", $updateEmployee);
    $sql .= " WHERE employee_ID = $id;";

    $pdo = SQLConnect();
    $numberLines = $pdo->query($sql);
    return is_numeric($numberLines) ? $updateEmployee : false;
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

    $pdo = SQLConnect();
    $employeesJSON = json_encode($pdo->query("SELECT * FROM employees")->fetchAll(PDO::FETCH_ASSOC));
    echo $employeesJSON;
}

function showDashboard()
{
    require_once VIEWS . "dashboard/dashboard.php";
}

function SQLConnect()
{
    $dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE;
    $pdo = new PDO($dsn, USER, PASSWORD);
    return $pdo;
}
