<?php



include_once 'classes/loader.php';
include_once 'classes/basecontroller.php';
//if (empty($_GET['id'])) {
//    HomeController::invoke();
//} else {
//    HomeController::showSanpham(filter_input(INPUT_GET, 'id'));
//}

$loader = new Loader(filter_input_array(INPUT_GET));
$controller= $loader->createController();
$controller->executeAction();