<?php

/**
 * Description of cart
 *
 * @author duc
 */
//include_once $_SERVER['DOCUMENT_ROOT'] . '/WebsiteBanHang/setup.php';
require 'classes/setup.php';
class CartController extends BaseController {

    public function __construct($action, $urlvalues) {
        parent::__construct($action, $urlvalues);
    }

    public function index() {
        session_start();
        if (!empty($_SESSION['cart-items'])) {
            $sanpham = $_SESSION['cart-items'];
        }
        include 'views/Cart/index.php';
    }

}
