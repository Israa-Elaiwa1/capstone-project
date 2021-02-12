<?php
include_once("vendorClass.php");
if (isset($_POST['submit'])) {
  $vendor_email     = $_POST['email'];
  $vendor_password  = $_POST['password'];
  $result          = $vendor->login($vendor_email,$vendor_password);
  if ($result) {
    header("location:vendorDashboard.php");
  }
  else {
    $error = "Vendor Not Found!<br> Check Your Email Or Password!";
  }
}
?>
<!doctype html>
<html lang="en">
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


  <body class="text-center" style="background-color:#edf1f5">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-4 col-sm-6 col-xs-12">
    <form action="" method="post" enctype="multipart/form-data">
      <h1 class="h3 mt-4 mb-5 font-weight-bold text-primary">Welcome Back!</h1>
      <h1 class="h3 mb-5 font-weight-normal text-primary">Login</h1>
      <input type="email" class="form-control mb-4" placeholder="Email address" name="email" required autofocus>
      <input type="password" class="form-control mb-4" placeholder="Password" name="password" required>
      <?php
      if (isset($error)) {

        echo "<div style='background:#FFDDDD;padding:6px;margin-bottom:20px'>".$error."</div>";

      }
      ?>

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Log In</button>
      <div class="card-footer text-center text-black-50">Don't have an account? <a href="vendorSignup.php">Sign Up</a></div>

      <p class="mt-5 mb-3 text-muted">&copy; 2021 © Smart Shop Ecommerce Website</p>
    </form>
  </div>
</div>
</div>
  </body>
</html>
