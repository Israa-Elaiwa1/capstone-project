<?php
session_start();
include("header.php");
include_once("loginMainClass.php");
if (isset($_POST['submit'])) {
  $email     = $_POST['email'];
  $password  = $_POST['password'];
  $password2  = $_POST['password2'];
  $name      = $_POST['name'];
  $num       = $_POST['num'];
  $image     = $_FILES['image']['name'];
  $temp_name = $_FILES['image']['tmp_name'];
  $path      = "../images/";
  move_uploaded_file($temp_name,$path.$image);
  $sign=$customer->signup($email,$password,$password2,$name,$num,$image);
  if($sign=="This Email Already Exists!")
  {
   $error1=$sign;
  }
  elseif($sign=="Passwords Don't match!"){
  $error2=$sign;
  }
  elseif($sign=="successfull")
  {
    echo"<script type='text/javascript'>window.location='login.php'</script>";

  }
}

?>
  <!-- Main Container -->
  <section class="main-container col1-layout bounceInUp animated">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h1>Create an Account</h1>
        </div>
        <fieldset class="col2-set">
          <legend>Login or Create an Account</legend>
          <div class="col-1 new-users"><strong>New Customers</strong>
            <div class="content">
              <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
              <div class="buttons-set">
                <p>If you have an account with us, please log in.</p>

                <a href="login.php"class="btn button login">Login</a>
              </div>
            </div>
          </div>
          <div class="col-2 registered-users"><strong>Registered Customers</strong>
            <div class="content">
              <form action="" method="post" enctype="multipart/form-data">
              <ul class="form-list">
                <li>
                  <label for="name">Name <span class="required">*</span></label>
                  <br>
                  <input type="text" title="" id="name" class="input-text" name="name" required>
                </li>
                <li>
                  <label for="email">Email Address <span class="required">*</span></label>
                  <br>
                  <input type="text" title="" class="input-text" id="email" value="" name="email" required>
                </li>
                <?php
                if (isset($error1)) {
                echo"<div class='alert alert-danger' role='alert' width='500'>
                {$error1}
                </div>
                ";
                }
                ?>
                <li>
                  <label for="pass">Password <span class="required">*</span></label>
                  <br>
                  <input type="password" title="" id="pass" class="input-text" name="password" required>
                </li>
                <li>
                  <label for="pass2">Confirm Password <span class="required">*</span></label>
                  <br>
                  <input type="password" title="" id="pass2" class="input-text" name="password2" required>
                </li>
                <?php
                    if (isset($error2)) {
                    echo"<div class='alert alert-danger' role='alert' width='500'>
                    {$error2}
                    </div>
                    ";
                    }
                    ?>
                <li>
                  <label for="num">Mobile Number<span class="required">*</span></label>
                  <br>
                  <input type="text" title="" id="num" class="input-text" name="num" required>
                </li>
                <div class="form-group">
                  <label for="image" class="control-label mb-1">Image</label>
                  <input name="image" type="file" class="form-control" name="image" required>
                </div>

              </ul>
              <p class="required">* Required Fields</p>
              <div class="buttons-set">
                <button id="send2" name="submit" type="submit" class="button login"><span>Signup</span></button>
              </div>
            </form>
            </div>
          </div>
        </fieldset>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </section>
  <!-- Main Container End -->

  <?php
   include("footer.php");
  ?>
</div>
<?php
 include("mobileMenu.php");
?>
<!-- JavaScript -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/parallax.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.flexslider.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>
<script type="text/javascript" src="js/cloud-zoom.js"></script>
</body>
</html>
