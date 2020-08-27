<?php

//HOST -> Server
define("HOST", 'localhost');

//DATABASE -> DataBase name
define("DATABASE", 'employee_management');

//USER -> user of the MySQL server
define("USER", 'root');

//PASSWORD -> password of the MySQL user
define("PASSWORD", '');

//PDO to send SQL queries
$dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE;
$pdo = new PDO($dsn, USER, PASSWORD);
