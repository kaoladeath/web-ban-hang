<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thanh toan</title>
        <?php include 'views/Layout/head.php' ?>
    </head>
    <body>
        <!--Header-->
        <?php include 'views/Layout/header.php' ?>
        <!--End Header-->

        <!--Content-->
        <!--Form thanh toan -->
        <div class="container">
            <div class="row">
                <div class="ch-box col-xs-6 left-col">
                    <div class="ch-box-inner">
                        <form role="form" method="POST" action="/WebsiteBanHang/Cart/Dathang">
                            <h3>Bước 1: Nhập Email</h3>
                            <div class="form-group">
                                <label for="email" class="mylabel">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="example@gmail.com">
                            </div>
                            <hr>
                            <h3>Bước 2: Nhập thông tin giao hàng</h3>
                            <div class="form-group">
                                <label for="ten" class="mylabel">Tên người nhận:</label>
                                <input type="text" id="ten" name="ten" class="form-control" placeholder="Tên người nhận">
                            </div>
                            <div class="form-group">
                                <label for="diachi" class="mylabel">Địa chỉ - số nhà - đường:</label>
                                <textarea type="text" id="diachi" name="diachi" class="form-control" placeholder="Địa chỉ - số nhà - đường"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="thanhpho" class="mylabel">Thành phố:</label><br/>
                                <select id="thanhpho" name="thanhpho" class="selectpicker">
                                    <option value="Hồ Chí Minh" selected="true">Hồ Chí Minh</option>
                                    <option value="Hà Nội">Hà Nội</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quan_huyen" class="mylabel">Quận-Huyện:</label><br/>
                                <select id="quan_huyen" name="quan_huyen" class="selectpicker">
                                    <option value="Bình Thạnh" selected="true">Bình Thạnh</option>
                                    <option value="Gò Vấp">Gòạnh Vấp</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phuong_xa" class="mylabel">Phường-Xã:</label><br/>
                                <select id="phuong_xa" name="phuong_xa" class="selectpicker">
                                    <option value="phường 5" selected="true">Phường 5</option>
                                    <option value="phường 6">Phường 6</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dienthoai" class="mylabel">Điện thoại:</label>
                                <input type="text" id="dienthoai" name="dtthoai" class="form-control" placeholder="Số điện thoại">
                            </div>
                            <hr>
                            <h3>Bước 3: Chọn phương thức thanh toán</h3>
                            <div id="phuong_thuc_thanh_toan">
                                <ul class="ch-menu">
                                    <li>
                                        <a href="#phuong_thuc_thanh_toan" class="pttt">
                                            <p>Thanh toán khi nhận hàng</p>
                                            <img src="/WebsiteBanHang/views/Contents/images/Icon_Wallet_sm.png" />
                                            <br/>
                                            <input type="radio" checked="true" name="thanh_toan_khi_nhan_hang" class="my-radio">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#phuong_thuc_thanh_toan" class="pttt">
                                            <p>Thanh toán qua thẻ ngân hàng</p>
                                            <img src="/WebsiteBanHang/views/Contents/images/icon_credit_card_sm.png">
                                            <br/>
                                            <input type="radio" name="thanh_toan_qua_the_ngan_hang" class="my-radio">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <h3>Bước 4: Kiểm tra kỹ thông tin trên sau đó bấm nút đặt hàng</h3>
                            <button type="submit" class="btn btn-success" id="btn-submit"><span class="glyphicon glyphicon-ok"></span> Đặt hàng</button>
                        </form>
                    </div>
                </div>
                <!--End Form thanh toan -->
                <div class="ch-box right-col col-xs-4">
                    <div class="ch-box-inner">
                        <h4>Thông tin đơn hàng</h4>
                        <hr>
                        <table data-toggle="table" class="ch-table">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá sản phẩm</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Non 2</td>
                                    <td>3</td>
                                    <td>50.000 VND</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <p>Tạm tính <span style="float: right">50.000 VND</span></p>
                    </div>
                </div>
            </div>
        </div>
        <!--End Content-->
        <!--Footer-->
        <?php include 'views/Layout/footer.php' ?>
        <!--End Footer-->
        <script>
            var lastPos = 0;
            $(".pttt").click(function (event) {
                $(".my-radio").removeAttr("checked");
                $(this).find('input[type="radio"]').prop("checked", true);
                //lastPost = $(window).scrollTop();
            });
            /*
             $(window).bind('hashchange',function(){
             location.hash = '';
             $(window).scrollTop(lastPos);
             //alert(location.hash);
             });*/

            $('#btn-submit').on('click',function (e){
               e.preventDefault();
               var form = $(this).parent('form');
               swal({
                   title: "Bạn muốn đặt hàng ?",
                   text: "Hãy kiểm tra kỹ lại thông tin!",
                   type: "info",
                   showCancelButton: true,
                   confirmButtonClass: "btn btn-primary",
                   confirmButtonText: "Vâng! đặt hàng",
                   closeOnConfirm: true
               },
               function(){
                   form.submit();
               });
            });
        </script>
    </body>
</html>
