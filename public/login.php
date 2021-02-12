<?php
session_start();
include_once("header.php");
include_once("loginMainClass.php");
if (isset($_POST['submit'])) {
  $cust_email     = $_POST['email'];
  $cust_password  = $_POST['password'];
  $result         = $customer->login($cust_email,$cust_password);
  if ($result) {
  echo"  <script type='text/javascript'>window.location='index.php'</script>";
  }
  else {
    $error = "Customer Account Not Found!";
  }
}
?>
  <!-- Main Container -->
  <section class="main-container col1-layout bounceInUp animated">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h1>Login</h1>
        </div>
        <fieldset class="col2-set">
          <legend>Login or Create an Account</legend>
          <div class="col-1 new-users"><strong>New Customers</strong>
            <div class="content">
              <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
              <div class="buttons-set">
                <a href="signup.php"class="btn button login">Sign Up</a>
              </div>
            </div>
          </div>
          <div class="col-2 registered-users"><strong>Registered Customers</strong>
            <div class="content">
              <p>If you have an account with us, please log in.</p>
              <form action="" method="post" enctype="multipart/form-data">
              <ul class="form-list">
                <li>
                  <label for="email">Email Address <span class="required">*</span></label>
                  <br>
                  <input type="text" title="" class="input-text" id="email" name="email">
                </li>
                <li>
                  <label for="pass">Password <span class="required">*</span></label>
                  <br>
                  <input type="password" title="" id="pass" class="input-text" name="password">
                </li>
              </ul>
              <p class="required">* Required Fields</p>
              <div class="buttons-set">
                <button id="send2" name="submit" type="submit" class="button login"><span>Login</span></button>
              </div>
              <?php
              if (isset($error)) {
                echo "<div style='background:#FFDDDD;padding:6px;margin-bottom:20px'>".$error."</div>";
                echo"<div class='card-footer text-center text-black-50'>Don't have an account? <a href='signup.php'>Sign Up</a></div>";

              }
              ?>
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
