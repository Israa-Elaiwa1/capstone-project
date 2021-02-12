
<?php
include("header.php");
include("editAccountClass.php");
if (!isset($_SESSION['cust_id']) || $_SESSION['cust_id'] != true)
{

  echo "<script type='text/javascript'>window.location='404Error.php'</script>";
}
else {


$cust_id  = $_SESSION['cust_id'];
$read     = $account->readById($cust_id);
if (isset($_POST['submit'])) {
  $cust_name             = $_POST['name'];
  $cust_email            = $_POST['email'];
  $cust_password         = $_POST['pass1'];
  $new_password          = $_POST['pass2'];
  $new_password_confirm  = $_POST['pass3'];
  $cust_num              = $_POST['num'];

  if($_FILES['image']['name']){
  $image      =   $_FILES['image']['name'];
  $tmpName    =   $_FILES['image']['tmp_name'];
  $path       =   '../images/';
  move_uploaded_file($tmpName, $path.$image);
  }
  else {
  $image       =  $read[0]['cust_img'];
  }
  $edit = $account->editProfile($cust_id,$cust_name,$cust_email,$cust_password,$new_password,$new_password_confirm,$cust_num,$image);
  if($edit=="Your New Passwords Can not be Your Old Password!")
  {
   $error1=$edit;
  }
  elseif($edit=="Your Passwords Do Not Match!"){
  $error2=$edit;
  }

}

?>
  <!-- Main Container -->
  <section class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-9 animated" style="visibility: visible;">
          <div class="my-account">
            <div class="page-title">
              <h1>Edit Account Information</h1>
            </div>
            <div class="line"></div>
            <div class="dashboard">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="fieldset">
                  <input name="" type="hidden" value="bO6ubPokBJ71l86o">
                  <h2 class="legend">Account Information</h2>
                  <ul class="form-list">
                        <div class="input-box name-firstname">
                          <label for="firstname">Full Name</label>
                          <div class="input-box1">
                            <input type="text" id="firstname" name="name" value="<?php echo $read[0]['cust_name']?>" title="" maxlength="255" class="input-text required-entry">
                          </div>
                        </div>

                    <li>
                      <label for="email">Email Address</label>
                      <div class="input-box">
                        <input type="text" name="email" id="email" value="<?php echo $read[0]['cust_email']?>" title="Email Address" class="input-text required-entry validate-email">
                      </div>
                    </li>

                    <li>
                      <label for="num">Mobile Number</label>
                      <div class="input-box">
                        <input type="text" name="num" id="num" value="<?php echo $read[0]['cust_num']?>" title="Mobile Number" class="input-text required-entry">
                      </div>
                    </li>

                    <li>
                      <label for="current_password">Current Password</label>
                      <div class="input-box">
                        <input type="password" value="<?php echo $read[0]['cust_password']?>" title="Current Password" class="input-text" name="pass1" id="current_password" readonly>
                      </div>
                    </li>
                    <li>
                        <label for="password">New Password</label>
                        <div class="input-box">
                          <input type="password" title="New Password" class="input-text validate-password" name="pass2" id="password">
                        </div>
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
                        <label for="confirmation">Confirm New Password</label>
                        <div class="input-box">
                          <input type="password" title="Confirm New Password" class="input-text validate-cpassword" name="pass3" id="confirmation">
                        </div>
                    </li>
                    <?php
                             if (isset($error2)) {
                             echo"<div class='alert alert-danger' role='alert' width='500'>
                             {$error2}
                             </div>
                             ";
                             }
                             ?>

                    <div class="form-group">
                      <label for="image" class="control-label mb-1">Image</label>
                      <input name="image" type="file" class="form-control" value="">
                    </div>
                  </ul>
                </div>

                <div class="buttons-set">
                  <button type="submit" name="submit" class="button"><span>Save</span></button>
                  <a href="index.php"><small>« </small>Back To Home</a> </div>
              </form>
            </div>
            <!--dashboard-->
          </div>
        </div>
        <div class="col-main col-sm-3 animated" style="visibility: visible;">
          <img src="../images/<?php echo $read[0]['cust_img']?>"height="200" width="300" style="border-radius:50%" alt="">
        </div>


      </div>
    </div>
  </section>
  <br><br>
  <!-- Main Container End -->
<?php }
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
