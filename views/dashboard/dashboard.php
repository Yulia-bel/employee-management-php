<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->

<html>
<?php

include "assets/head.html";
session_start();

if (!isset($_SESSION["userId"])) {
    header('Location: index.php');
}

if (isset($_GET['user_changed'])) {
    $changed = $_GET['user_changed'];
    echo "<script type='text/javascript'>alert('Changes saved!');</script>";
}


$now = time();
$timeDifference = $now - $_SESSION["startTime"];

if ($timeDifference > 500) {
    $_SESSION = array();
    session_destroy();
    header("Location: index.php?logout");
}
?>

<body>
    <?php
    include "assets/header.html";
    echo $_SESSION["startTime"];
    echo "<br>";
    echo $timeDifference;
    ?>

    <div class="container-main py-5 px-4 px-md-5 container-fluid">

        <div id="jsGrid"></div>

    </div>


    <script src="assets/js/login.js"></script>
    <script type="text/javascript" src="node_modules/jsgrid/dist/jsgrid.min.js"></script>

</body>

</html>