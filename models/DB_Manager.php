<?php

$db = "employee_management";

function ConnectSQL()
{
    $user = "root";
    $pass = "";
    $server = "localhost";
    $connection = new mysqli($server, $user, $pass);
    if ($connection->connect_error) {
        die("Error while connecting: " . $connection->connect_error);
    }
    return $connection;
}

function CreateDB($connection, $db)
{
    $sql = "CREATE DATABASE " . $db;
    if ($connection->query($sql) === true) {
        echo "DataBase created correctly.";
    } else {
        die("Error when creating the database: " . $connection->error);
    }
}

function SelectDB($connection, $db)
{
    $sql = "USE " . $db;

    if ($connection->query($sql) === true) {
        echo "Database selected <br>";
    } else {
        die("Error when selecting the database: " . $connection->error);
    }
}

function CreateTable($connection, $table)
{
    $sql = "CREATE TABLE " . $table;
    if ($connection->query($sql) === true) {
        echo "Table created correctly.";
    } else {
        die("Error when creating the table: " . $connection->error);
    }
}

function FillTable($connection, $values)
{
    $sql = $values;
    if ($connection->query($sql) === true) {
        echo "Table filled correctly.";
    } else {
        die("Error when filling the table: " . $connection->error);
    }
}
