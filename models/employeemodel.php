<?php

class employeeModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function get() {

        $conn = $this->db->connect();
        $stmt = $conn->prepare("SELECT * FROM employees");
        $stmt->execute();

        $employees = $stmt->fetchAll(PDO::FETCH_OBJ);

        return json_encode($employees);
    }

    public function insertEmployee($employee) {

        $conn = $this->db->connect();

        $stmt = $conn->prepare("INSERT INTO employees (name,email,age,city,phoneNumber,postalCode,state,streetAddress) VALUES ('" . $employee['name'] . "', '" . $employee['email'] . "', " . $employee['age'] . ", '" . $employee['city'] . "',  '" . $employee['phoneNumber'] ."', " .  $employee['postalCode'] .", '" . $employee['state'] . "', '" . $employee['streetAddress'] . "')");
        
        if ($stmt->execute()) {
            $stmt = $conn->prepare("SELECT * FROM employees WHERE name='". $employee['name'] ."' AND email='" .$employee['email'] ."' LIMIT 1 " );
            $stmt->execute();

            if($stmt->rowCount()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC); 
                echo json_encode($result);
            }
        }
    }

    public function deleteEmployee($id) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("DELETE FROM employees WHERE id=". $id);
        $stmt->execute();
    }

    public function getById($param = null) {
        $id = $param[0];
        $conn = $this->db->connect();
        $stmt = $conn->prepare("SELECT * FROM employees WHERE id=". $id . " LIMIT 1");
        
        if ($stmt->execute() && $stmt->rowCount()) {
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        };
    }
}

/*function addEmployee(array $newEmployee)
{
    $employees = readEmployees();
    $newEmployee['employee_ID'] = getNextIdentifier($employees);
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
    $sql = " UPDATE employees SET";
    $sql .= " employee_name = '" . $updateEmployee['employee_name'] . "'";
    $sql .= ", employee_lastName = '" . $updateEmployee['employee_lastName'] . "'";
    $sql .= ", email = '" . $updateEmployee['email'] . "'";
    $sql .= ", gender = '" . $updateEmployee['gender'] . "'";
    $sql .= ", age = '" . $updateEmployee['age'] . "'";
    $sql .= ", streetAddress = '" . $updateEmployee['streetAddress'] . "'";
    $sql .= ", city = '" . $updateEmployee['city'] . "'";
    $sql .= ", country_state = '" . $updateEmployee['country_state'] . "'";
    $sql .= ", postalCode = '" . $updateEmployee['postalCode'] . "'";
    $sql .= ", phoneNumber = '" . $updateEmployee['phoneNumber'] . "'";
    $sql .= ", photo = '" . $updateEmployee['photo'] . "'";
    $sql .= " WHERE employee_ID = " . $updateEmployee['employee_ID'] . ';';

    $pdo = SQLConnect();
    $numberLines = $pdo->query($sql);
    return is_numeric($numberLines) ? $updateEmployee : false;
}


function getEmployee(string $id)
{
    $requiredEmployee = null;

    $employees = readEmployees();
    foreach ($employees as $employee) {
        if ($employee->employee_ID == $id) {
            $requiredEmployee = $employee;
            $_SESSION['employeeId'] = $employee->employee_ID;
            break;
        }
    }
    return $requiredEmployee;
}


function getNextIdentifier(array $employeesCollection): int
{
    $last_id = (int) end($employeesCollection)->employee_ID;
    return $last_id + 1;
}

//My functions 

function getEmployees()
{
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
}*/
