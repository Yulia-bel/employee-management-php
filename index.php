<?php

include_once "config/constants.php";
include_once "libs/sessionHelper.php";

if (isset($_GET['controller'])) {
    $controller = getControllerPath($_GET['controller']);
    $fileExists = file_exists($controller);
    if ($fileExists) {
        require_once $controller;
    } else {
        $errorMsg = "The page you are trying to access does not exist.";
    }
} else {
    require_once CONTROLLERS . "loginController.php";
}

function getControllerPath($controller): string
{
    return CONTROLLERS . $controller . "Controller.php";
}
