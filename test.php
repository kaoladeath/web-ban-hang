<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "setup.php";
use Model\KhachhangQuery;
$khachHangQuery = new KhachhangQuery();
$khachHang = $khachHangQuery->findPk(1);
echo $khachHang->getTenkh();
echo $khachHang->getEmail();