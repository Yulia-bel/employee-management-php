<?php
require_once "../models/DB_Manager.php";

$users = "users (
    user_ID INT(4) NOT NULL,
    user_name VARCHAR(16) NOT NULL,
    user_password VARCHAR(16) NOT NULL,
    email VARCHAR(30) NOT NULL
);";

$employees = "employees (
    employee_ID VARCHAR(4) NOT NULL,
    employee_name VARCHAR(16) NOT NULL,
    employee_lastName VARCHAR(16) NOT NULL,
    email VARCHAR(30) NOT NULL,
    gender VARCHAR(10) NOT NULL,    
    age VARCHAR(3) NOT NULL,
    streetAddress VARCHAR(50) NOT NULL,
    city VARCHAR(16) NOT NULL,
    country_state VARCHAR(16) NOT NULL,
    postalCode VARCHAR(8) NOT NULL,
    phoneNumber VARCHAR(16) NOT NULL,
    photo VARCHAR(200) NOT NULL
);";

$users_values = "INSERT INTO users (user_ID, user_name, user_password, email)
                    VALUES(1,'admin', '$2y$10\$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC', 'admin@assemblerschool.com');";

$employees_values = "INSERT INTO employees (employee_ID, employee_name, employee_lastName, email, gender, age, streetAddress, city, country_state, postalCode, phoneNumber, photo)
                    VALUES('2','John', 'Doe', 'jhondoe@foo.com', 'man', '34', '89', 'New York', 'WA', '09889', '1283645645', 'https:\/\/i.imgur.com\/E34i4pP.jpg'),
                    ('3','Leila', 'Mills', 'mills@leila.com', 'Female', '29', '55', 'San Diego', 'CA', '059245', '956202451', ''),
                    ('4','Richard', 'Desmond', 'dismond@foo.com', 'man', '30', '90', 'Salt Lake city', 'UT', '457320', '90876987654', 'https:\/\/images.unsplash.com\/photo-1541271696563-3be2f555fc4e?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ'),
                    ('5','Susan', 'Smith', 'susanmith@baz.com', 'Female', '28', '43', 'Louisville', 'KNT', '445321', '224355488976', 'https:\/\/images.generated.photos\/5sVKL2aYfPY7rLsYtNSvOxaYEW28HoU7k6rgq5oQn8g\/rs:fit:512:512\/Z3M6Ly9nZW5lcmF0\/ZWQtcGhvdG9zL3Yy\/XzA5MTM2ODYuanBn.jpg'),
                    ('6','Brad', 'Simpsons', 'brad@foo.com', 'man', '40', '128', 'Atlanta', 'GEO', '394221', '6854634522', ''),
                    ('7','Neil', 'Walker', 'walkerneil@baz.com', 'man', '42', '1', 'Nashville', 'TN', '90143', '45372788192', 'https:\/\/images-na.ssl-images-amazon.com\/images\/M\/MV5BMzYyODUzMTMzN15BMl5BanBnXkFtZTgwMzc5NDg1NjE@._V1_UX172_CR0,0,172,256_AL_.jpg'),
                    ('8','Ale', 'Guyk', 'ale@gmail.com', 'man', '27', '6', 'Vice City', 'CA', '08912', '678346255', 'https:\/\/randomuser.me\/api\/portraits\/women\/82.jpg'),
                    ('9','Jaime', 'Botet', '', 'man', '30', '', '', '', '', '', 'https:\/\/randomuser.me\/api\/portraits\/men\/10.jpg');";

//Connect with server
// $connection = ConnectSQL();
//Create DB
// CreateDB($connection);
//Select DB
// SelectDB($connection, DATABASE);
//Create Tables
// CreateTable($connection, $users);
// CreateTable($connection, $employees);
//Fill tables
// FillTable($connection, $users_values);
// FillTable($connection, $employees_values);

//Select methods with PDO
$dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE;
$pdo = new PDO($dsn, USER, PASSWORD);

$users = $pdo->query("SELECT * FROM users");
// echo $users;
$employees = $pdo->query("SELECT * FROM employees");

$userRows = $users->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($userRows);
// echo "</pre>";
$employeesRows = $employees->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($employeesRows);
echo "</pre>";

// foreach ($userRows as $row) {
//     echo "{$row['user_ID']} {$row['user_name']} {$row['user_password']} {$row['email']} <br>";
// }

// foreach ($employeesRows as $row) {
//     echo "{$row['employee_ID']} {$row['employee_name']} {$row['employee_lastName']} {$row['email']} {$row['gender']} {$row['age']} {$row['streetAddress']} {$row['city']} {$row['country_state']} {$row['postalCode']} {$row['phoneNumber']} <br>";
// }
