<?php

//include_once $_SERVER['DOCUMENT_ROOT'] . '/WebsiteBanHang/classes/setup.php';
//include_once 'classes/setup.php';
require $_SERVER['DOCUMENT_ROOT'] . '/WebsiteBanHang/classes/setup.php';
header('Content-Type: application/json');
use Model\SanphamQuery;
\session_start();
if (!empty($_POST['action'])) {
    switch (filter_input(INPUT_POST, 'action')) {
        case "add":
            if(empty($_SESSION['dssanpham'])){
                $dssanpham = SanphamQuery::create()->find();
            }else{
                $dssanpham = $_SESSION['dssanpham'];
            }
            $sanphamById = $dssanpham->getArrayCopy("Masanpham");
            $sanpham = $sanphamById[$_POST['id']];
            $sanpham->setSoluong(1);
            if (empty($_SESSION['cart-items'])) {
                $array[$sanpham->getMasanpham()] = $sanpham;
                $_SESSION['cart-items'] = $array;
            } else {
                if (array_key_exists($sanpham->getMasanpham(), $_SESSION['cart-items'])) {
                    $sp = $_SESSION['cart-items'][$sanpham->getMasanpham()];
                    $sp->setSoluong($sp->getSoluong() + 1);
                } else {
                    $_SESSION['cart-items'][$sanpham->getMasanpham()] = $sanpham;
                }
            }
            break;
    }
}

$tong_so_luong = 0;
$tong_tien = 0;
if (!empty($_SESSION['cart-items'])) {
    foreach ($_SESSION['cart-items'] as $sp) {
        $tong_so_luong += $sp->getSoluong();
        $tong_tien += ($sp->getSoluong()*$sp->getGiasp());
    }
}

echo '{"tong_so_luong":"'.$tong_so_luong.'","tong_tien":"'.$tong_tien.'"}';
