<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/WebsiteBanHang/setup.php';
//use Model\SanphamQuery;
\session_start();
if (!empty($_POST['action'])) {
    switch (filter_input(INPUT_POST, 'action')) {
        case "add":
            /* if(empty($_SESSION['count'])){
              $_SESSION['count'] = 1;
              }else{
              $_SESSION['count'] += 1;
              } */
            $dssanpham = $_SESSION['dssanpham'];
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
if (!empty($_SESSION['cart-items'])) {
    foreach ($_SESSION['cart-items'] as $sp) {
        $tong_so_luong += $sp->getSoluong();
    }
}

echo $tong_so_luong;
