<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <?php include 'views/Layout/head.php'; ?>

    </head>

    <body class="cms-index-index">
        <div class="page">
            <!-- Header -->

            <?php include 'views/Layout/header.php'; ?>

            <!-- end header -->

            <!-- Navbar -->

            <?php include 'views/Layout/navbar.php'; ?>

            <!-- end nav -->


            <!--Body page-->
            <div class="container">

                <div class="row">
                    <br/>
                    <p style="font-size: 160%"><strong>GIỎ HÀNG</strong></p>
                    <?php
                    if (!isset($sanpham)) {
                        ?>
                        <p style="font-size: 130%">Giỏ hàng trống</p>
                        <?php
                    } else {
                        ?>
                        <table data-toggle="table">
                            <thead>
                                <tr>
                                    <th>Sản phẩm ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá bán</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($sanpham as $sp) {
                                    ?>
                                    <tr>
                                        <td><?php echo $sp->getMasanpham(); ?></td>
                                        <td><?php echo $sp->getTensanpham(); ?></td>
                                        <td><?php echo $sp->getSoluong(); ?></td>
                                        <td><?php echo $sp->getGiasp(); ?></td>
                                        <td><?php echo $sp->getThanhtien(); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>



                </div>

            </div>
            <!--End body page-->
        </div>

        <?php include 'views/Layout/footer.php'; ?>

    </body>
</html>
