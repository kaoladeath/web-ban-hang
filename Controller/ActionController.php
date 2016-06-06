<?php
include 'ModelUtil/ModelUtil.php';
class ActionController {
    //$baitren_mottrang = 9;
    
    function __construct() {
        
    }

    //lay 8 san pham
    public function NewProductIndex() {
        $result = LayDanhSachSanPham(8);
        return $result;
    }

    //lay 4 san pham
    public function HotProduct() {
        return LayDanhSachSanPham(4);
    }

    //lay 1 san pham voi id dua vao
    public function DetailoneProduct($idsanpham) {
        return LaySanPham($idsanpham);
    }

    //lay san pham theo loai
    public function SanPhamTheoLoai($maloai) {
        return LayDanhSachSanPham(0, $maloai);
    }

    public function GetSoTrang() {
        $baitren_mottrang = 9;
        
        $sodulieu = count(LayDanhSachSanPham());

        $sotrang = $sodulieu / $baitren_mottrang;
        return $sotrang;
    }

    public function productpaged($page) {
        $baitren_mottrang = 9;
        //lay san pham
        $sodulieu = $sodulieu = count(LayDanhSachSanPham());

        $sotrang = $sodulieu / $baitren_mottrang;

        //lay san pham co gioi han
        $result = $this->connclass->query('SELECT * FROM sanpham 
				LIMIT ' . $page * $baitren_mottrang . ',' . $baitren_mottrang . '');

        return $result;
    }

    public function ThanhToan($ten, $dt, $diachi, $tongtien) {
        //lay don hang
        $temp = "SELECT * FROM donhang";
        $result = $this->connclass->query($temp);
        $dems = $result->num_rows;

        //them don hang
        $my_query = "INSERT INTO donhang 
						 VALUES('{$dems}',
						 	'{$ten}',
						 	'{$dt}',
						 	'{$diachi}',
						 	'{$tongtien}')";


        $this->connclass->query($my_query);
    }

    public function XacThuc($adem, $sptemp) {
        $temp = "SELECT * FROM donhang";
        $result = $this->connclass->query($temp);
        $dems = ($result->num_rows) - 1;

        $query_string = "INSERT INTO chitietdonhang
							 VALUES('" . $adem . "','" . $dems . "','" . $sptemp . "')";
        $this->connclass->query($query_string);
    }

    public function GetLoaiSanPham() {
        //lay loai san pham
        $my_query = "SELECT * FROM loaisanpham";
        $result = $this->connclass->query($my_query);
        return $result;
    }

    public function GetLoaiSanPhamTHEOMA($maloai) {
        //lay loai san pham theo ma duoc dua vao
        $my_query = "SELECT TenLoai FROM loaisanpham WHERE MaLoai =" . $maloai;
        $result = $this->connclass->query($my_query);
        return $result;
    }

    ////////////////////////////////

    //them san pham
    public function ThemSanPham($ten, $chitiet, $gia, $maloai, $hinh) {

        $temp = "SELECT * FROM sanpham";
        $result = $this->connclass->query($temp);
        $dems = ($result->num_rows) + 1;

        $my_query = "INSERT INTO sanpham
						VALUES('{$dems}' ,
								'{$ten}' ,
								'{$chitiet}' ,
								'{$gia}' ,
								'{$maloai}' ,
								'{$hinh}')";
        $this->connclass->query($my_query);
    }

    //sua san pham
    public function SuaSanPham($id, $ten, $chitiet, $gia, $maloai, $hinh) {
        $my_query = "UPDATE sanpham 
						 SET 
							Ten = '{$ten}' ,
							ChiTiet = '{$chitiet}' ,
							Gia = '{$gia}' ,
							MaLoai = '{$maloai}' ,
							Hinh = '{$hinh}'
						WHERE ID = '{$id}'";
        $this->connclass->query($my_query);
    }

    //xoa san pham
    public function XoaSanPham($id) {
        $my_query = "DELETE FROM sanpham WHERE ID = '$id'";
        $this->connclass->query($my_query);
    }

    ///////////////////////////////

    //lay tat ca loai san pham
    public function GetAllLoai() {
        $my_query = "SELECT * FROM loaisanpham";
        return $this->connclass->query($my_query);
    }

    //lay loai san pham theo id
    public function GetoneLoai($id) {
        $my_query = "SELECT * FROM loaisanpham WHERE MaLoai = '{$id}'";
        return $this->connclass->query($my_query);
    }

    //them loai san pham
    public function ThemLoai($ten) {
        $temp = "SELECT * FROM loaisanpham";
        $result = $this->connclass->query($temp);
        $dems = ($result->num_rows) + 1;

        $my_query = "INSERT INTO loaisanpham VALUES('{$dems}','{$ten}')";
        $this->connclass->query($my_query);
    }

    //xoa loai san pham
    public function XoaLoai($maloai) {
        $my_query = "DELETE FROM loaisanpham WHERE MaLoai = '{$maloai}'";
        $this->connclass->query($my_query);
    }

    //sua loai san pham
    public function SuaLoai($maloai, $ten) {
        $my_query = "UPDATE loaisanpham  
						 SET TenLoai = '{$ten}' 
						 WhERE MaLoai = '{$maloai}'";
        $this->connclass->query($my_query);
    }

    //lay danh sach phieu dat hang
    public function hoadon() {
        $my_query = "SELECT * FROM donhang";
        $result = $this->connclass->query($my_query);
        return $result;
    }

    //lay chi tiet dat hang theo phieu dat hang id
    public function chitiethoadon($id) {
        $my_query = "SELECT chitietdonhang.*,`sanpham`.`Ten`,`sanpham`.`Gia` FROM chitietdonhang,donhang,sanpham 
			WHERE `chitietdonhang`.`MaDonHang`=`donhang`.`MaDonHang`
			and `sanpham`.`ID`=`chitietdonhang`.`MaSanPham`
			and `chitietdonhang`.`MaDonHang` = " . $id . "
			";
        $result = $this->connclass->query($my_query);
        return $result;
    }

    //xoa phieu dat hang
    public function Xoahoadon($mahd) {
        $query = "DELETE FROM chitietdonhang WHERE MaDonHang = '" . $mahd . "'";
        $my_query = "DELETE FROM donhang WHERE MaDonHang = '" . $mahd . "'";
        $result = $this->connclass->query($query);
        $result = $this->connclass->query($my_query);
        return $result;
    }

}
