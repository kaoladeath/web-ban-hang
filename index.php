<?php

include_once 'setup.php';
include_once 'Controller/HomeController.php';

if (empty($_GET['id'])) {
    HomeController::invoke();
} else {
    HomeController::showSanpham(filter_input(INPUT_GET, 'id'));
}