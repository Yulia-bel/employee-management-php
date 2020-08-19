<?php

function addEmployee(array $newEmployee)
{
    $employees = readEmployees();
    $newEmployee['id'] = getNextIdentifier($employees);
    array_push($employees, $newEmployee);
    return writeEmployees($employees) ? $newEmployee : false;
}

function writeEmployees($data)
{
    $data = json_encode($data, JSON_PRETTY_PRINT);
    $result = file_put_contents(RESOURCES . 'employees.json', $data);
    return is_numeric($result);
}

function readEmployees()
{
    $data = file_get_contents(RESOURCES . 'employees.json');
    return json_decode($data);
}


function deleteEmployee(string $id)
{
    $employees = readEmployees();

    $key = array_search($id, array_column($employees, 'id'));

    if (!is_numeric($key)) return false;
    array_splice($employees, $key, 1);
    //TODO  is this echo necessary?
    echo "deleted";

    return writeEmployees($employees);
}


function updateEmployee(array $updateEmployee)
{
    $employees = readEmployees();

    $key = array_search($updateEmployee['id'], array_column($employees, 'id'));
    if (!is_numeric($key)) return false;
    $employees[$key] = $updateEmployee;
    return writeEmployees($employees) ? $employees[$key] : false;
}


function getEmployee(string $id)
{
    $requiredEmployee = null;

    $employees = json_decode(file_get_contents(RESOURCES . 'employees.json'));
    foreach ($employees as $employee) {
        if ($employee->id == $id) {
            $requiredEmployee = $employee;
            $_SESSION['employeeId'] = $employee->id;
            break;
        }
    }
    return $requiredEmployee;
}


function getNextIdentifier(array $employeesCollection): int
{
    $last_id = (int) end($employeesCollection)->id;
    return $last_id + 1;
}

//My functions 

function getEmployees()
{
    $jsonFile = file_get_contents(RESOURCES . 'employees.json');
    echo $jsonFile;
}

function showDashboard()
{
    require_once VIEWS . "dashboard/dashboard.php";
}
