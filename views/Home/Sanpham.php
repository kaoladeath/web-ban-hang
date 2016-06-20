<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once 'View/Layout/head.php'; ?>

</head>

<body>
    <!--Header-->
    
    <?php include_once 'View/Layout/header.php'; ?>
    
    <!-- Navigation -->
    
    <?php include_once 'View/Layout/navbar.php';?>
    
    <!--Slider-->
    
    <?php include_once 'View/Layout/banner.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php include_once 'View/Layout/nav_loaisp.php'; ?>

            <div class="col-md-9">

                <div class="thumbnail">
                    <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right"><?php echo $sp->getGiasp(); ?> VND</h4>
                        <h4><a href="#"><?php echo $sp->getTensanpham(); ?></a>
                        </h4>
                        <p><?php echo $sp->getThongtin(); ?></p>
                    </div>
                </div>


            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

</body>

</html>
