<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->

<html>
<?php

include "../assets/head.html";
session_start();

if(!isset($_SESSION["userId"])) {
    header('Location: ../index.php');
}

if(isset($_GET['user_changed'])) {
    $changed = $_GET['user_changed'];
    echo "<script type='text/javascript'>alert('Changes saved!');</script>";
  }

 
$now = (new \DateTime())->format('U');
$timeDifference = $now - $_SESSION["startTime"];

if($timeDifference > 500) {
    $_SESSION = array();
    session_destroy();
    header("Location: ../index.php?logout=$timeDifference");
  }
?>

    <body>
       

    <?php
    include "../assets/header.html";
    ?>
        <div class="table-container">
        <?php 
            echo $_SESSION["startTime"]; 
            echo "<br>";
            echo $timeDifference;    
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Street No.</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Postal Code</th>
                        <th scope="col">Phone number</th>
                        <th scope="col"><i id="add-employee" class="fas fa-plus text-success"></i></th>
                    </tr>
                </thead>
                <tbody id="employee-row-info">
                </tbody>
            </table>
        <div>
    
    <script src="../assets/login.js"></script>
    
    </body>
</html>