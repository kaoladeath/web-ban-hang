<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Model\LoaispQuery;
use Model\SanphamQuery;

/**
 * Home Controller cho Home View
 */
class HomeController {
    //số sản phẩm dành cho 1 trang
    const SO_SP_1_TRANG = 6;
    /**
     * Tạo trang HomeView/index.php
     */
    static function invoke() {
        $trang_hien_tai = 0;
        session_start();
        if (!isset($_SESSION['loaded'])) {
            //lấy danh sách loại sản phẩm
            $loaiSp = LoaispQuery::create()->find();
            //lấy danh sách sản phẩm
            $dssanpham = SanphamQuery::create()->find();
            $sotrang = self::so_trang($dssanpham->count(), self::SO_SP_1_TRANG);
            //tạo 1 mảng chứa các mảng sản phẩm
            $trang_sanpham = self::Tao_sanpham_theo_trang($sotrang,$dssanpham->getArrayCopy());
            //lưu các giá trị đã tính vào session
            $_SESSION['loaded'] = true;
            $_SESSION['loai_sp'] = $loaiSp;
            $_SESSION['trang_sanpham'] = $trang_sanpham;
            $_SESSION['so_trang'] = $sotrang;
        } else {
            $loaiSp = $_SESSION['loai_sp'];
            $trang_sanpham = $_SESSION['trang_sanpham'];
            $sotrang = $_SESSION['so_trang'];
            if (isset($_GET['page'])) {
                $trang_hien_tai = empty($_GET['page']) ? 0 : filter_input(INPUT_GET, 'page') - 1;
            }
        }
        //tao view
        include 'View/HomeView/index.php';
    }

    /**
     * Tính số trang
     * @so_sanpham Số sản phẩm
     * @sanpham_1_trang Số sản phẩm cho 1 trang
     * @return Số trang
     */
    private static function so_trang($so_sanpham, $sanpham_1_trang) {
        return ceil($so_sanpham / $sanpham_1_trang);
    }
    
    /**
     * Phân các sản phẩm theo trang
     * @sotrang Số trang hiện có
     * @dssanpham Danh sách sản phẩm
     * @return array chứa array sản phẩm
     */
    private static function Tao_sanpham_theo_trang($sotrang,$dssanpham) {
        $trang_sanpham = [];
        $offset = 0;
        for ($i = 1; $i <= $sotrang; $i++) {
            $trang_sanpham[] = array_slice($dssanpham, $offset, self::SO_SP_1_TRANG);
            $offset += self::SO_SP_1_TRANG;
        }
        
        return $trang_sanpham;
    }

}
