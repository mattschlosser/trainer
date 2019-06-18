<?php

ini_set('session.gc_maxlifetime', 7200);

session_start();

include_once("../controllers/Controller.php");

$controller = new Controller();

$controller->invoke();

?>