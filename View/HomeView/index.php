
<!DOCTYPE html>
<html lang="vi">

    <head>

        <?php include_once 'View/Layout/head.php'; ?>

    </head>

    <body class="cms-index-index">
        <div class="page">
            <!-- Header -->

            <?php include_once 'View/Layout/header.php'; ?>

            <!-- end header -->
            
            <!-- Navbar -->
            
            <?php include_once 'View/Layout/navbar.php'; ?>
            
            <!-- end nav -->
            
            <!--Silder-->
            
            <?php include_once 'View/Layout/banner.php'; ?>
            
            <!--End Silder-->
            
            <!--Body page-->
            <div class="container">

                <div class="row">

                    <div class="col-md-3">
                        <p class="lead">Safety</p>
                        <div class="list-group">
                            <?php
                            foreach ($loaiSp as $loai) {
                                echo '<a href="#" class="list-group-item">' . $loai->getTenloaisp() . '</a>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="col-md-9">

                        <div class="row">

                            <?php
                            foreach ($trang_sanpham[$trang_hien_tai] as $sanpham) {
                                ?>
                                <div class="col-sm-4 col-lg-4 col-md-4">
                                    <div class="thumbnail">
                                        <img src="http://placehold.it/800x600" alt="">
                                        <div class="caption">
                                            <h4 class="pull-right"><?php echo $sanpham->getGiasp(); ?> VND</h4>
                                            <h4><a href="#"><?php echo $sanpham->getTensanpham(); ?></a>
                                            </h4>
                                            <p><?php echo $sanpham->getThongtin(); ?></p>
                                            <p><a href="" class="btn btn-info" style="visibility:hidden;"></a> <a href="javascript:;" onclick="cartAction('add', '<?php echo $sanpham->getMasanpham(); ?>')" class="btn btn-info btn-xs pull-right" role="button">Vao gio</a></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                    </div>

                </div>

                <!--Pagination-->
                <div class="text-center">
                    <ul class="pagination">
                        <?php
                        for ($i = 1; $i <= $sotrang; $i++) {
                            echo '<li><a href=' . $_SERVER['PHP_SELF'] . '?page=' . $i . '>' . $i . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <!--End Pagination-->

            </div>
            <!--End body page-->
        </div>
        <script>
            $(document).ready(function () {
                cartAction('', '');
            });
        </script>
    </body>
</html>