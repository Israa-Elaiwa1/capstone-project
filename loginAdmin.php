<?php
include_once("adminClass.php");
if (isset($_POST['submit'])) {
  $admin_email     = $_POST['email'];
  $admin_password  = $_POST['password'];
  $result          = $admin->login($admin_email,$admin_password);
  if ($result) {
    header("location:adminDashboard.php");
  }
  else {
    $error = "Admin Not Found!";
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
      <img class="mb-4" src="images/login.png" alt="" width="72" height="72">
      <h1 class="h3 mb-5 font-weight-normal">Sign In</h1>
      <input type="email" class="form-control mb-4" placeholder="Email address" name="email" required autofocus>
      <input type="password" class="form-control mb-4" placeholder="Password" name="password" required>

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021 © Smart Shop Ecommerce Website</p>
    </form>
  </div>
</div>
</div>
  </body>
</html>
