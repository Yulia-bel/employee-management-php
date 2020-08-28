<?php

//HOST -> Server
define("HOST", 'localhost');

//DATABASE -> DataBase name
define("DATABASE", 'employee_management');

//USER -> user of the MySQL server
define("USER", 'root');

//PASSWORD -> password of the MySQL user
define("PASSWORD", '');


//Connect and select the DATABASE

$connection = new mysqli(HOST, USER, PASSWORD);
if ($connection->connect_error) {
    die("Error while connecting: " . $connection->connect_error);
}

$sql = "USE " . DATABASE;
if ($connection->query($sql) === true) {
    // echo "Database selected <br>";
} else {
    die("Error when selecting the database: " . $connection->error);
}
