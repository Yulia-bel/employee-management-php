<?php
include_once "../config/db.php";


function ConnectSQL()
{
    $connection = new mysqli(HOST, USER, PASSWORD);
    if ($connection->connect_error) {
        die("Error while connecting: " . $connection->connect_error);
    }

    // $dsn = "mysql:host=". HOST . ";dbname=". DATABASE;
    // $pdo = new PDO($dsn, USER, PASSWORD);
    // $stm = $pdo->query("SELECT * FROM users");


    return $connection;
}

function CreateDB($connection)
{
    $sql = "CREATE DATABASE " . DATABASE;
    if ($connection->query($sql) === true) {
        echo "DataBase created correctly.";
    } else {
        die("Error when creating the database: " . $connection->error);
    }
}

function SelectDB($connection, $database)
{
    $sql = "USE " . $database;

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
