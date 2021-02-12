<?php
include_once("vendorProductClass.php");
include_once("vendorCustomerClass.php");
include_once("vendorClass.php");
$v_id        = $_SESSION['vendor_id'];
$products    = $product->NumOfmyProducts($v_id);
$orders      = $Vcustomer->numOfOrders($v_id);
$mostWanted  = $Vcustomer->mostWanted($v_id);
if ($mostWanted!=false) {
  $product_id = $mostWanted[0]['pro_id'];
  $num        = $mostWanted[0]['most'];
  $info       = $Vcustomer->productsInfo($product_id);
}
else {
  $info='';
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, Ample lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Ample admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Ample Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
        <?php include("includes/vendorHeader.php");?>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14"><a href="vendorDashboard.php">Dashboard</a></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ml-auto">
                                <li><a href="vendorDashboard.php">Dashboard</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->

                <div class="row justify-content-center">
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">My Products</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div><i class="fas fa-boxes fa-2x text-primary"></i>
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-primary"><?php echo $products[0]['num']?></span></li>
                            </ul>
                        </div>
                    </div>
                  </div>

                  <div class="row justify-content-center">
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <div class="white-box analytics-info">
                          <div class="row">
                            <div class="col-10">

                            <h3 class="box-title">Most Wanted</h3>
                          </div>
                          <div class="col-2">
                            <?php
                            if ($mostWanted!=NULL) {
                                echo"<h5 class='text-secondary'>";
                                echo $mostWanted[0]['most']." Demands</h5>";

                            }
                            else {
                              echo"<h5 class='text-secondary'>0 Demands</h5>";
                            }
                            ?>
                          </div>

                          </div>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div> <?php
                                    if ($mostWanted!==false) {
                                      if ($info!='') {
                                        echo"<img src='images/{$info[0]['pro_img']}' alt='product image' height='60' width='60'>";

                                      }
                                    }
                                    else {
                                      echo " ";
                                    }
                                    ?>
                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-success">
                                  <?php
                                  if ($mostWanted!=false) {
                                    if ($info!='') {
                                      echo $info[0]['pro_name']."</span>";
                                    }
                                  }
                                  else {
                                    echo"You Have No Demands yet.</span>";
                                  }
                                  ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                  </div>

                  <div class="row justify-content-center">
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">My Orders</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div><i class=" far fa-money-bill-alt fa-2x text-success"></i>

                                    </div>
                                </li>
                                <li class="ml-auto"><span class="counter text-success"><?php echo $orders[0]['num']?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->

            </div>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2021 © Smart Shop Ecommerce Website
            </footer>

            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <?php include("includes/vendorSide.php")?>

        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="plugins/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>
