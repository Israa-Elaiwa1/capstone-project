<?php
include_once("vendorProductClass.php");
include_once("vendorClass.php");
$v_id        = $_SESSION['vendor_id'];
if (isset($_POST['submit'])) {
  $catName            =  $_POST['cat'];
  $product->name      =  $_POST['name'];
  $product->desc      =  $_POST['desc'];
  $product->price     =  $_POST['price'];
  $product->contact   =  $_POST['contact'];
  $product->image     =  $_FILES['image']['name'];
  $tmpName            =  $_FILES['image']['tmp_name'];
  $path               =  'images/';
  move_uploaded_file($tmpName, $path.$product->image);

  $product->create($v_id,$catName);
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
                        <h4 class="page-title text-uppercase font-medium font-14"><a href="vendorProduct.php">My Products</a></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ml-auto">
                                <li><a href="vendorProduct.php">My Products</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb -->
            <!-- ============================================================== -->
            <?php
            $action = isset($_GET['action']) ? $_GET['action'] : 'dash';
              if($action=='dash')
              {?>
            <div class="container-fluid justify-content-center align-items-center mr-auto ml-auto">

              <div class="col-lg-10 col-xlg-9 col-md-12 mr-auto ml-auto">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="box-title mb-3 text-center">Add Product</h4>
                          <form action="" method="post" enctype="multipart/form-data">

                              <div class="form-group mb-4">
                                  <label class="col-md-12 p-0">Name</label>
                                  <div class="col-md-12 border-bottom p-0">
                                      <input type="text" placeholder="Product Name"
                                          class="form-control p-0 border-0" name="name">
                                  </div>
                              </div>
                              <div class="form-group mb-4">
                                  <label class="col-md-12 p-0">Description</label>
                                  <div class="col-md-12 border-bottom p-0">
                                      <input type="text" placeholder="Product Description"
                                          class="form-control p-0 border-0" name="desc">
                                  </div>
                              </div>


                              <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Product Image</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="image">
                                  <label class="custom-file-label text-muted font-weight-light" for="customFile">Product Image</label>
                                </div>
                              </div>


                              <div class="form-group mb-4">
                                  <label class="col-md-12 p-0">Price</label>
                                  <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="Product Price"
                                        class="form-control p-0 border-0" name="price">
                                   </div>
                              </div>
                              <div class="form-group mb-4">
                                  <label class="col-md-12 p-0">Contact</label>
                                  <div class="col-md-12 border-bottom p-0">
                                      <input type="text" placeholder="Contact Information"
                                          class="form-control p-0 border-0" name="contact">
                                  </div>
                              </div>
                              <div class="form-group mb-4">
                                  <label class="col-md-12 p-0">Category</label>
                                  <div class="col-md-12 border-bottom p-0">
                                      <select class="custom-select"name="cat">
                                        <?php
                                        $category = $product->getCat();
                                        if ($category) {
                                          foreach ($category as $row) {
                                            echo"<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";

                                          }
                                        }
                                        ?>
                                      </select>
                                  </div>
                              </div>

                              <div class="form-group mb-4">
                                  <div class="col-sm-12 text-center">
                                      <button class="btn btn-danger" name="submit">Add Product</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>





            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
                <div class="row">
                  <div class="col-lg-10 col-xlg-9 col-md-12 mr-auto ml-auto">
                      <div class="white-box">
                          <h3 class="box-title text-center mb-4">Manage Products</h3>
                          <div class="table-responsive">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th class="font-weight-boldborder-top-0">ID</th>
                                          <th class="font-weight-bold	border-top-0">Name</th>
                                          <th class="font-weight-bold	border-top-0">Description</th>
                                          <th class="font-weight-bold	border-top-0">Image</th>
                                          <th class="font-weight-bold	border-top-0">Price</th>
                                          <th class="font-weight-bold	border-top-0">Category</th>
                                          <th class="font-weight-bold	border-top-0">Contact Information</th>
                                          <th class="font-weight-bold	border-top-0">Status</th>
                                          <th class="font-weight-bold border-top-0">Edit</th>
                                          <th class="font-weight-bold border-top-0">Delete</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $data  = $product->myProducts($v_id);
                                    if ($data) {
                                      foreach ($data as $row) {
                                      $id  = $product->getCatID($row['cat_id']);
                                        echo"
                                        <tr>
                                            <td>{$row['pro_id']}</td>
                                            <td>{$row['pro_name']}</td>
                                            <td>{$row['pro_desc']}</td>";
                                            if ($row['pro_img']!=NULL) {
                                             echo "<td><img src='images/{$row['pro_img']}' width='125' height='100'/></td>";
                                           }
                                           else {
                                             echo"<td> </td>";
                                           }
                                            echo"<td>{$row['pro_price']}</td>
                                            <td>{$id[0]['cat_name']}</td>
                                            <td>{$row['pro_contact']}</td>
                                            <td>{$row['pro_status']}</td>
                                            <td><a href='vendorProduct.php?action=edit&id={$row['pro_id']}' class='btn btn-sm btn-warning'>Edit</a></td>
                                            <td><a href='vendorProduct.php?action=delete&id={$row['pro_id']}' class='btn btn-sm btn-danger'>Delete</a></td>

                                        </tr>
                                        ";

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
            </footer> <?php }
            elseif ($action=='delete') {
              $id    = $_GET['id'];
              $product->delete($id);
            }
            elseif ($action=='edit') {
              $id    = $_GET['id'];
              $read  =$product->readById($id);
              if (isset($_POST['edit'])) {
                $product->name    = $_POST['name'];
                $product->desc    = $_POST['desc'];
                $product->price   = $_POST['price'];
                $product->contact = $_POST['contact'];
                $product->cat     = $_POST['cat'];
                if($_FILES['image']['name']){
               $product->image      =   $_FILES['image']['name'];
               $tmpName    =   $_FILES['image']['tmp_name'];
               $path       =   'images/';
               move_uploaded_file($tmpName, $path.$product->image);
              }
              else {
              $product->image       =  $read[0]['pro_img'];
              }

              $product->edit($id);
              }
            ?>

              <div class="container-fluid justify-content-center align-items-center mr-auto ml-auto">

                <div class="col-lg-10 col-xlg-9 col-md-12 mr-auto ml-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title mb-3 text-center">Add Product</h4>
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Name</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" class="form-control p-0 border-0"
                                         name="name" value="<?php echo $read[0]['pro_name']?>">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Description</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" class="form-control p-0 border-0"
                                        name="desc"value="<?php echo $read[0]['pro_desc']?>">
                                    </div>
                                </div>


                                <div class="form-group mb-4">
                                  <label class="col-md-12 p-0">Product Image</label>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image">
                                    <label class="custom-file-label text-muted font-weight-light" for="customFile">Product Image</label>
                                  </div>
                                </div>


                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Price</label>
                                    <div class="col-md-12 border-bottom p-0">
                                      <input type="text"class="form-control p-0 border-0"
                                       name="price"value="<?php echo $read[0]['pro_price']?>">
                                     </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Contact</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text"class="form-control p-0 border-0"
                                         name="contact"value="<?php echo $read[0]['pro_contact']?>">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Category</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <select class="custom-select"name="cat">
                                          <?php
                                          $category = $product->getCat();
                                          if ($category) {
                                            foreach ($category as $row) {
                                              echo"<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";

                                            }
                                          }
                                          ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="col-sm-12 text-center">
                                        <button class="btn btn-danger" name="edit">Update Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

      <?php }


            ?>

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
