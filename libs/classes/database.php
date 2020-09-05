<?php

require "config/config.php";

class Database{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
    }

    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            ];
            
            $pdo = new PDO($connection, $this->user, $this->password, $options);

            if ($pdo && $pdo->query("USE employees")) {
                return $pdo;
             } else 
             if ($conn && !$conn->query("USE employees")) {
                $query = file_get_contents("config/db.sql");
                $pdo->exec($query);
                return $pdo;
             } else {
             }
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}

?>
