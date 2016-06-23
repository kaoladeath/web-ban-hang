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
        <!--Nav bar-->
        <?php include 'views/Layout/navbar.php' ?>
        <!--End Nav bar-->
        <!--Content-->
        <div class="container">
            <div class="row">
                <div class="ch-box col-xs-6 left-col">
                    <div class="ch-box-inner">
                        <form role="form" method="POST">
                            <h3>Buoc 1: Nhap Email</h3>
                            <div class="form-group">
                                <label for="email" class="mylabel">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="example@gmail.com">
                            </div>
                            <hr>
                            <h3>Buoc 2: Nhap thong tin giao hang</h3>
                            <div class="form-group">
                                <label for="name" class="mylabel">Ten Nguoi Nhan:</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="ten nguoi nhan">
                            </div>
                            <div class="form-group">
                                <label for="diachi" class="mylabel">Dia chi - So nha - Duong:</label>
                                <textarea type="text" id="diachi" name="diachi" class="form-control" placeholder="dia chi - so nha - duong"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="thanhpho" class="mylabel">Thanh Pho:</label><br/>
                                <select id="thanhpho" name="thanhpho" class="selectpicker">
                                    <option value="Ho Chi Minh" selected="true">Ho Chi Minh</option>
                                    <option value="Ha Noi">Ha Noi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quan_huyen" class="mylabel">Quan-Huyen:</label><br/>
                                <select id="quan_huyen" name="quan_huyen" class="selectpicker">
                                    <option value="Binh Thanh" selected="true">Quan Binh Thanh</option>
                                    <option value="Go Vap">Quan Go Vap</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phuong_xa" class="mylabel">Phuong-Xa:</label><br/>
                                <select id="phuong_xa" name="phuong_xa" class="selectpicker">
                                    <option value="phuong 5" selected="true">5</option>
                                    <option value="phuong 6">6</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dienthoai" class="mylabel">Dien thoai:</label>
                                <input type="text" id="dienthoai" name="thoai" class="form-control" placeholder="So dien thoai">
                            </div>
                            <hr>
                            <h3>Buoc 3: Kiem tra ky thong tin tren sau do bam nut dat hang</h3>
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Dat hang</button>
                        </form>
                    </div>
                </div>
                <div class="ch-box right-col col-xs-4">
                    <div class="ch-box-inner">
                        <h4>Thong tin don hang</h4>
                        <hr>
                        <table data-toggle="table" class="ch-table">
                            <thead>
                                <tr>
                                    <th>Ten san pham</th>
                                    <th>So luong</th>
                                    <th>Gia san pham</th>
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
                        <p>Tam tinh <span style="float: right">50.000 VND</span></p>
                    </div>
                </div>
            </div>
        </div>
        <!--End Content-->
        <!--Footer-->
        <?php include 'views/Layout/footer.php' ?>
        <!--End Footer-->
    </body>
</html>
