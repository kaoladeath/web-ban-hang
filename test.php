<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'setup.php';
use Model\SanphamQuery;
$dssanpham = SanphamQuery::create()->find();
$sanphamById = $dssanpham->getArrayCopy('Masanpham');
$sanpham = $sanphamById[2];
$array[] = 1;
$array[] = 2;
$array[] = 3;
echo \count($array);