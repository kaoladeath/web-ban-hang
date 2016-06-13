<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


use Model\LoaispQuery;

function invoke (){
    $loaiSp = LoaispQuery::create()->find();
    include 'View/HomeView/index.php';
}
