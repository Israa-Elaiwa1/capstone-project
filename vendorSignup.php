<?php
include("vendorClass.php");

if(isset($_POST['submit'])){

  $name      = $_POST['name'];
  $email     = $_POST['email'];
  $password  = $_POST['password'];
  $confirm   = $_POST['password2'];
  $num       = $_POST['num'];
  $country   = $_POST['country'];
  $image = $_FILES['image']['name'];
  $temp_name = $_FILES['image']['tmp_name'];
  $path = "images/";
  move_uploaded_file($temp_name,$path.$image);
  $sign=$vendor->signup($email,$password,$confirm,$name,$num,$image,$country);


 if($sign=="This Email Already Exists!")
 {
  $error1=$sign;
 }
 elseif($sign=="Passwords Don't match!"){
 $error2=$sign;
 }
 elseif($sign=="successfull")
 {
  // echo"<script>window.location='loginVendor.php'</script>";
  $msg='Your request has been sent to the admin, please log in after 24 hours.';
 }

}?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

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

<body class="login">


   <div class="d-flex align-items-center" style="min-height: 100vh">
       <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px;">
           <div class="card navbar-shadow">
             <br>
                   <h4 class="card-title mt-5 text-center text-primary">Join Us As A Vendor</h4>
                   <h4 class="card-title mt-2 text-center">Sign Up</h4>

               <div class="card-body">



                   <form action="" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                           <div class="input-group input-group-merge">
                               <input id="name" name="name" type="text" required="" class="form-control form-control-prepended" placeholder="Your first and last name">
                               <div class="input-group-prepend">
                                   <div class="input-group-text">
                                       <span class="far fa-user"></span>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="input-group input-group-merge">
                               <input id="email" name="email" type="email" required="" class="form-control form-control-prepended" placeholder="Your email address">
                               <div class="input-group-prepend">
                                   <div class="input-group-text">
                                       <span class="far fa-envelope"></span>

                                   </div>

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

                       </div>
                       <div class="form-group">
                           <div class="input-group input-group-merge">
                               <input name="password" id="password" type="password" required="" class="form-control form-control-prepended" placeholder="Choose a password">
                               <div class="input-group-prepend">
                                   <div class="input-group-text">
                                       <span class="fa fa-key"></span>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <div class="form-group">
                           <div class="input-group input-group-merge">
                               <input name="password2" id="password2" type="password" required="" class="form-control form-control-prepended" placeholder="Confirm password">
                               <div class="input-group-prepend">
                                   <div class="input-group-text">
                                       <span class="fa fa-key"></span>
                                   </div>
                               </div>
                           </div>
                       </div><?php
                           if (isset($error2)) {
                           echo"<div class='alert alert-danger' role='alert' width='500'>
                           {$error2}
                           </div>
                           ";
                           }
                           ?>
                       <div class="form-group">
                           <div class="input-group input-group-merge">
                               <input id="mobile" name="num" type="text" required="" class="form-control form-control-prepended"  placeholder="Your Mobile Number">
                               <div class="input-group-prepend">
                                   <div class="input-group-text">
                                       <span class="fas fa-mobile-alt"></span>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="form-group mb-4">
                         <div class="custom-file">
                         <input type="file" class="custom-file-input" name="image" required>
                         <label class="custom-file-label text-muted" for="customFile">Choose Image</label>
                         </div>
                       </div>

                       <div class="form-group">
                           <div class="input-group input-group-merge">
                               <input id="Country" name="country" type="text" required="" class="form-control form-control-prepended"  placeholder="Your location">
                               <div class="input-group-prepend">
                                   <div class="input-group-text">
                                       <span class="fas fa-map-marker-alt"></span>
                                   </div>
                               </div>
                           </div>
                       </div>

               <button type="submit" name="submit" class="btn btn-primary btn-block mb-3">Sign Up</button>
                       <div class="form-group text-center mb-0">
                           <div class="custom-control custom-checkbox">
                                                           </div>
                       </div>
                  <?php if (isset($msg)) {
                       echo"<div class='alert alert-success' role='alert' width='500'>
                       {$msg}
                       </div>
                       ";
                       }
                       ?>
                   </form>

               </div>
               <div class="card-footer text-center text-black-50">Already signed up? <a href="loginVendor.php">Login</a></div>
           </div>
       </div>
   </div>


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
   <script type="text/javascript">

$(".custom-file-input").on("change", function() {
 var fileName = $(this).val().split("\\").pop();
 $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>




</body>

</html>
