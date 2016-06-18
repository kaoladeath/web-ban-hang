<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'setup.php';
use Model\SanphamQuery;
$dssanpham = SanphamQuery::create()->find()->getArrayCopy();
$dssanpham_2 = array_slice($dssanpham, 0,6);
echo $dssanpham_2[0]->getTensanpham();