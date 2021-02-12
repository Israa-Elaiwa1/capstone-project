<?php
include_once("manageVendorsClass.php");
include_once("vendorClass.php");
$v_id        = $_SESSION['vendor_id'];
$data        = $mv->readById($v_id);
if (isset($_POST['edit'])) {
  $name              = $_POST['name'];
  $email             = $_POST['email'];
  $password          = $_POST['password'];
  $new_pass          = $_POST['nPass'];
  $new_pass_confirm  = $_POST['nPassConfirm'];
  $num               = $_POST['num'];
  $country           = $_POST['country'];

  if($_FILES['image']['name']){
 $image      =   $_FILES['image']['name'];
 $tmpName    =   $_FILES['image']['tmp_name'];
 $path       =   'images/';
 move_uploaded_file($tmpName, $path.$image);
}
else {
$image       =  $data[0]['v_img'];
}
$edit  = $mv->editProfile($v_id,$name,$email,$password,$new_pass,$new_pass_confirm,$num,$country,$image);
if($edit=="Your New Passwords Can not be Your Old Password!")
{
 $error1=$edit;
}
elseif($edit=="Your Passwords Do Not Match!"){
$error2=$edit;
}


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
                        <h4 class="page-title text-uppercase font-medium font-14"><a href="vendorProfile.php">My Profile</a></h4>
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

<div class="col-lg-8 col-xlg-9 col-md-12">
    <div class="card">
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Full Name</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control p-0 border-0" name="name"
                          value="<?php echo $data[0]['v_name']?>">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Email</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="email" class="form-control p-0 border-0" name="email"
                          value="<?php echo $data[0]['v_email']?>">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Password</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="password" class="form-control p-0 border-0"
                          value="<?php echo $data[0]['v_password']?>" name="password" readonly>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">New Password</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="password" class="form-control p-0 border-0"
                          value="" name="nPass">
                    </div>
                </div>
                <?php
                         if (isset($error1)) {
                         echo"<div class='alert alert-danger' role='alert' width='500'>
                         {$error1}
                         </div>
                         ";
                         }
                         ?>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Confirm New Password</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="password" class="form-control p-0 border-0"
                          value="" name="nPassConfirm">
                    </div>
                </div>
                <?php
                         if (isset($error2)) {
                         echo"<div class='alert alert-danger' role='alert' width='500'>
                         {$error2}
                         </div>
                         ";
                         }
                         ?>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Phone No</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control p-0 border-0"
                         value="<?php echo $data[0]['v_num']?>" name="num">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Country</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" class="form-control p-0 border-0"
                         value="<?php echo $data[0]['v_country']?>" name="country">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <div class="col-sm-12">
                        <button class="btn btn-success" name="edit">Update Profile</button>
                    </div>
                </div>
        </div>
    </div>
</div>
            <div class="col-lg-4 col-xlg-3 col-md-12">
                  <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user" src="images/<?php echo $data[0]['v_img']?>">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)"><img src="images/<?php echo $data[0]['v_img']?>"
                                        class="thumb-lg img-circle" alt="img"></a>
                                <h4 class="text-white mt-2"><?php echo $data[0]['v_name']?></h4>
                                <h5 class="text-white mt-2"><?php echo $data[0]['v_email']?></h5>
                            </div>
                        </div>

                    </div>
                </div>
                 <div class="custom-file">
                <input type="file" class="custom-file-input" name="image">
                <label class="custom-file-label text-muted font-weight-light" for="customFile">Choose Image</label>
                </div>
            </div>
    </form>
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
<script>
// to make the name of the image appear
$(".custom-file-input").on("change", function() {
var fileName = $(this).val().split("\\").pop();
$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>

</html>
