<?php
session_start();

require_once 'libs/classes/session.php';
require_once 'libs/classes/controller.php';
require_once 'libs/classes/view.php';
require_once 'libs/classes/model.php';
require_once 'libs/classes/router.php';
require_once 'libs/classes/database.php';

require_once 'config/config.php';

$app = new App();

?>

  