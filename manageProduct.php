<?php
include("manageProductClass.php");
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

        <?php include("includes/header.php");?>

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
                        <h4 class="page-title text-uppercase font-medium font-14"><a href="manageProduct.php">Manage Product</a></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ml-auto">
                                <li><a href="manageProduct.php">Manage Product</a></li>
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
            <?php
            $action = isset($_GET['action']) ? $_GET['action'] : 'dash';
              if($action=='dash')
              {?>
            <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-12">
                      <div class="white-box">
                          <h3 class="box-title text-center mb-4">Manage Products</h3>
                          <div class="table-responsive">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th class="font-weight-bold border-top-0">ID</th>
                                          <th class="font-weight-bold border-top-0">Name</th>
                                          <th class="font-weight-bold border-top-0">Image</th>
                                          <th class="font-weight-bold border-top-0">Description</th>
                                          <th class="font-weight-bold border-top-0">Price</th>
                                          <th class="font-weight-bold border-top-0">Status</th>
                                          <th class="font-weight-bold border-top-0">Category</th>
                                          <th class="font-weight-bold border-top-0">Vendor</th>
                                          <th class="font-weight-bold border-top-0">Deactivate</th>
                                          <th class="font-weight-bold border-top-0">Delete</th>


                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $data = $pro->read();
                                    if($data)
                                    { foreach ($data as $row) {
                                      $cat_name = $pro->readCat($row['cat_id'])[0]['cat_name'];
                                      $vendor_name = $pro->readVendor($row['v_id'])[0]['v_name'];
                                      echo"<tr>
                                          <td>{$row['pro_id']}</td>
                                          <td>{$row['pro_name']}</td>";
                                          if ($row['pro_img']!=NULL) {
                                            echo"<td><img src='images/{$row['pro_img']}' height='100' width='100'/></td>";
                                          }
                                          else {
                                            echo"<td> </td>";
                                          }
                                          echo"<td>{$row['pro_desc']}</td>
                                          <td>$.{$row['pro_price']}</td>
                                          <td class='font-weight-bold'>{$row['pro_status']}</td>
                                          <td>{$cat_name}</td>
                                          <td>{$vendor_name}</td>";
                                          if ($row['pro_status']=='active') {
                                            echo"<td><a href='manageProduct.php?action=deactive&id={$row['pro_id']}' class='btn btn-sm btn-warning'>Deactivate Product</a></td>";
                                          }
                                          elseif ($row['pro_status']=='deactive') {
                                            echo"<td><a href='manageProduct.php?action=active&id={$row['pro_id']}' class='btn btn-sm btn-success'>Activate Product</a></td>";
                                          }
                                          echo"<td><a href='manageProduct.php?action=delete&id={$row['pro_id']}' class='btn btn-sm btn-danger'>Delete</a></td>
                                      </tr>";


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
          <?php }
          elseif ($action=='deactive') {
            $pro_id  = $_GET['id'];
            $status  = 'deactive';
            $pro->edit($pro_id,$status);
          }
          elseif ($action=='active') {
            $pro_id  = $_GET['id'];
            $status  = 'active';
            $pro->edit($pro_id,$status);
          }
          elseif ($action=='delete') {
            $pro_id  = $_GET['id'];
            $pro->delete($pro_id);
          }
          ?>

            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <?php include("includes/side.php")?>

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
