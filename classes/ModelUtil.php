<?php
use Model\SanphamQuery;

/**
 * Lay danh sach san pham
 * @limit so san pham can lay default = 0
 * @loai loc theo loai default = null
 * @return array
 */
function LayDanhSachSanPham($limit = 0,$loai = null){
    if($loai === null){
        $sanphams = SanphamQuery::create()->limit($limit)->find();
    }else{
        $sanphams = SanphamQuery::create()->filterByLoaisp($loai)->limit($limit)->find();
    }
    return $sanphams;
}

/**
 * Lay san pham theo id
 * @id id cua san pham can lay
 * @return SanPham
 */
function LaySanPham($id){
    return SanphamQuery::create()->findPk($id);
}