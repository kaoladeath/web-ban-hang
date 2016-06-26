<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
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

    public function thanhtoan() {
        include 'views/Cart/ThanhToan.php';
    }

    public function dathang() {
        $keys = ['email','ten','diachi','thanhpho','quan_huyen','phuong_xa','dtthoai','thanh_toan_khi_nhan_hang','thanh_toan_qua_the_ngan_hang'];
        $arrayPost = $this->filter_keys_array(filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING),$keys);
        $email = $arrayPost['email'];
        $ten = $arrayPost['ten'];
        $diachi = $arrayPost['diachi'];
        $thanhpho = $arrayPost['thanhpho'];
        $quan_huyen = $arrayPost['quan_huyen'];
        $phuong_xa = $arrayPost['phuong_xa'];
        $dtthoai = $arrayPost['dtthoai'];
        $thanh_toan_khi_nhan_hang = $arrayPost['thanh_toan_khi_nhan_hang'];
        $thanh_toan_qua_the_ngan_hang = $arrayPost['thanh_toan_qua_the_ngan_hang'];
        $cach_thanh_toan = $thanh_toan_khi_nhan_hang === '' ? 'Thanh toán qua thẻ ngân hàng' : 'Thanh toán khi nhận hàng';
        $success = $this->send_mail($email, $ten, $diachi, $thanhpho, $quan_huyen, $phuong_xa, $dtthoai, $cach_thanh_toan);

        include 'views/Cart/DatHang.php';
    }

    private function filter_keys_array($array, $key_array) {
        $keys = array_keys($array);
        foreach ($key_array as $key_array) {
            if (in_array($key_array, $keys)) {
                continue;
            }
            $array[$key_array] = '';
        }
        return $array;
    }
    
    private function send_mail($email,$ten,$diachi,$thanhpho,$quan_huyen,$phuong_xa,$dtthoai,$cach_thanh_toan){
        $to = $email;
        $subject = 'Phiếu đặt hàng';
        $message = "Tên người nhận: $ten\r\n"
                . "Địa chỉ: $diachi\r\n"
                . "Thành phố: $thanhpho\r\n"
                . "Quận-Huyện: $quan_huyen\r\n"
                . "Phường-Xã: $phuong_xa\r\n"
                . "Số điện thoại người nhận: $dtthoai\r\n"
                . "Cách thanh toán: $cach_thanh_toan\r\n";
        $headers = [];
        $headers[] = "Content-type: text/plain; charset=iso-8859-1";
        $headers[] = "From: Hồng Đức <hongducphannuyen@yahoo.com>";
        $headers[] = "X-Mailer: PHP/".phpversion();
        $success = mail($to, $subject, $message,  implode("\r\n", $headers));
        if($success){
            return TRUE;
        }
        return FALSE;
    }

}
