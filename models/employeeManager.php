<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

// session_start();

function addEmployee(array $newEmployee)
{
    // TODO implement it

    $users = json_decode(file_get_contents(RESOURCES . 'employees.json'));
    array_push($users, $newEmployee);
    file_put_contents(RESOURCES . 'employees.json', json_encode($users));
}


function deleteEmployee(string $id)
{
    // TODO implement it

    $now = (new \DateTime())->format('U');

    $timeDifference = $now - $_SESSION["startTime"];

    if ($timeDifference > 500) {
        echo "expired";
    } else {
        $employees = json_decode(file_get_contents(RESOURCES . 'employees.json'));

        foreach ($employees as $employee) {

            if ($employee->id == $id) {
                $index = array_search($employee, $employees);
                array_splice($employees, $index, 1);
                file_put_contents(RESOURCES . 'employees.json', json_encode($employees));
                echo "deleted";
            }
        }
    }
}


function updateEmployee(array $updateEmployee)
{
    // TODO implement it
    $employees = json_decode(file_get_contents(RESOURCES . 'employees.json'));

    foreach ($employees as $employee) {
        if ($employee->id == $updateEmployee['id']) {

            $key = array_search($employee, $employees);

            $object = json_decode(json_encode($updateEmployee), FALSE);

            $employees[$key] = $object;

            file_put_contents(RESOURCES . 'employees.json', json_encode($employees));
        }
    }
}


function getEmployee(string $id)
{
    // TODO implement it
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


function removeAvatar($id)
{
    // TODO implement it
}


function getQueryStringParameters(): array
{
    // TODO implement it
}

function getNextIdentifier(array $employeesCollection): int
{
    // TODO implement it

    $lastIndex = count($employeesCollection) - 1;
    $newId = $employeesCollection[$lastIndex]->id + 1;
    $newIdInt = (int)$newId;
    return $newIdInt;
}

//My functions 

function getEmployees()
{
    $jsonFile = file_get_contents(RESOURCES . 'employees.json');
    echo $jsonFile;
}
