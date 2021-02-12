<?php
include_once("vendorCustomerClass.php");
include_once("vendorClass.php");
$v_id   =  $_SESSION['vendor_id'];
$data   =  $Vcustomer->readV($v_id);
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
                        <h4 class="page-title text-uppercase font-medium font-14"><a href="vendorCustomer.php">My Customers</a></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ml-auto">
                                <li><a href="vendorCustomer.php">My Customers</a></li>
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
                <div class="row">
                  <div class="col-sm-12">
                      <div class="white-box">
                          <h3 class="box-title text-center mb-4">View Customers</h3>
                          <div class="table-responsive">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th class="font-weight-bold border-top-0">Order Id</th>
                                          <th class="font-weight-boldborder-top-0">Customer Name</th>
                                          <th class="font-weight-bold	border-top-0">Customer Number</th>
                                          <th class="font-weight-bold	border-top-0">Customer Email</th>
                                          <th class="font-weight-bold	border-top-0">Customer Image</th>
                                          <th class="font-weight-bold border-top-0">Product Purchased Id</th>
                                          <th class="font-weight-bold border-top-0">Purchased Products</th>
                                          <th class="font-weight-bold border-top-0">Product Quantity</th>
                                          <th class="font-weight-bold border-top-0">Order Total</th>
                                          <th class="font-weight-bold border-top-0">Order Date</th>


                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    if ($data) {
                                      $c =0;
                                      foreach ($data as $row) {
                                        $order_id = $data[$c]['order_id'];//to get the O_id from order_detail
                                        $order =$Vcustomer->readOrder($order_id); //to get customer id from orders
                                        $cust = $order[0]['cust_id'];
                                        $customer =$Vcustomer->readC($cust);//get the customer information

                                        $pro_id=   $data[$c]['pro_id'];//get product's id that vendor has added
                                        $pro_info =$Vcustomer->productsInfo($pro_id);//use it to get product info


                                          echo"<tr> <td>{$order_id}</td>";
                                          if ($customer!=NULL) {

                                         echo"<td>{$customer[0]['cust_name']}</td>
                                              <td>{$customer[0]['cust_num']}</td>
                                              <td>{$customer[0]['cust_email']}</td>";
                                              if ($customer[0]['cust_img']!=NULL) {
                                              echo"<td><img src='images/{$customer[0]['cust_img']}' height='100' width='100'/></td>";
                                              }
                                              else {
                                                echo "<td> </td>";
                                              }
                                            }
                                            else {
                                              echo "<td class='text-danger'>Can Not Show customer Information! </td>
                                                    <td class='text-danger'> </td>
                                                    <td class='text-danger'></td>
                                                    <td class='text-danger'> </td>";

                                            }
                                              if ($pro_info!=NULL) {
                                                echo "<td>{$pro_info[0]['pro_id']}</td>
                                                      <td>{$pro_info[0]['pro_name']}</td>";
                                              }
                                              else {
                                                echo "<td class='text-danger'>Can Not Show Product Information, this product has been deleted! </td>
                                                      <td class='text-danger'>Can Not Show Product Information, this product has been deleted! </td>";}

                                            echo" <td>{$data[$c]['pro_quantity']} Item</td>
                                                  <td>$.{$order[0]['grandTotal']}</td>
                                                  <td>{$order[0]['order_date']}</td>";



                                              echo"</tr>";


                                          $c=$c+1;
                                      }
                                    }

                                    ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                </div>
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
