<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
// TODO implement it

$users = json_decode(file_get_contents('../../resources/employees.json'));
array_unshift($users, $newEmployee);
file_put_contents('../../resources/employees.json', json_encode($users));
}


function deleteEmployee(string $email)
{
// TODO implement it



}


function updateEmployee(array $updateEmployee)
{
// TODO implement it
}


function getEmployee(string $id)
{
// TODO implement it
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
}

//My functions 

function getEmployees(){
    $jsonFile = file_get_contents('../../resources/employees.json');
    echo $jsonFile;

}
