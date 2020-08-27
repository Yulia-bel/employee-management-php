<?php

include_once "config/constants.php";
include_once "config/db.php";
include_once "libs/sessionHelper.php";


if (isset($_REQUEST['controller'])) {
    $controller = getControllerPath($_REQUEST['controller']);
    $fileExists = file_exists($controller);
    if ($fileExists) {
        require_once $controller;
    } else {
        $errorMsg = "The page you are trying to access does not exist.";
    }
} elseif (isset($_SESSION['userId'])) header("Location: ?controller=login&action=loadDashboard");
else {
    require_once CONTROLLERS . "loginController.php";
}

function getControllerPath($controller): string
{
    return CONTROLLERS . $controller . "Controller.php";
}
