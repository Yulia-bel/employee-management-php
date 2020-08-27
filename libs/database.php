<?php
require_once "../models/DB_Manager.php";

$users = "users (
    user_ID INT(4) NOT NULL,
    user_name VARCHAR(16) NOT NULL,
    user_password VARCHAR(60) NOT NULL,
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

$usersValues = "INSERT INTO users (user_ID, user_name, user_password, email)
                    VALUES(1,'admin', '$2y$10\$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC', 'admin@assemblerschool.com');";

$employeesValues = "INSERT INTO employees (employee_ID, employee_name, employee_lastName, email, gender, age, streetAddress, city, country_state, postalCode, phoneNumber, photo)
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
// FillTable($connection, $usersValues);
// FillTable($connection, $employeesValues);

//Select methods with PDO
$dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE;
$pdo = new PDO($dsn, USER, PASSWORD);

// $users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
$usersObject = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_OBJ);
// echo "<pre>";
// print_r($usersObject);
// echo "</pre>";

// $employees = $pdo->query("SELECT * FROM employees")->fetchAll(PDO::FETCH_ASSOC);
// $employeesObject = $pdo->query("SELECT * FROM employees")->fetchAll(PDO::FETCH_OBJ);

//We return to the AJAX call in login.js the Array of employees
// if (isset($_GET['action'])) {
//     if ($_GET['action'] == "getEmployees") {
//         echo $employeesObject;
//     } else if ($_GET['action'] == "getUsers") {
//         echo $usersObject;
//     }
// }


//just trying out stuff


$username = "admin";
$password = "123456";


function checkUser($username, $password, $pdo)
{
    $usersObject = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_OBJ);

    $found = false;

    foreach ($usersObject as $user) {
        if ($user->user_name == $username) {
            if (password_verify($password, $user->user_password) == true) {
                $found = true;
            }
        }
    }
    return $found;
}

if (checkUser($username, $password, $pdo)) {
    echo "User athentified!";
}
