<?php
 include("header.php");
 include_once("loginMainClass.php");
 include_once("editAccountClass.php");
 include_once("dashboardClass.php");
 if ($customer->logedinCheck()==true){
 $customerId  = $_SESSION['cust_id'];
 $customerInfo =$account->readById($customerId);
 $order = $dash->readOrderDetails($customerId);

 ?>
  <!-- Main Container -->
  <section class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-9">
          <div class="page-title">
            <h1>My Dashboard</h1>
          </div>
          <div class="my-account">
            <div class="dashboard">
              <div class="recent-orders">
                <div class="title-buttons"><strong>Recent Orders</strong> </div>
                <div class="table-responsive">
                  <table class="data-table" id="my-orders-table">
                    <col>
                    <col>
                    <col>
                    <col width="1">
                    <col width="1">
                    <col width="1">
                    <thead>
                      <tr class="first last">
                        <th>Order Id</th>
                        <th>Product Purchased</th>
                        <th>Product Image</th>
                        <th><span class="nobr">Bill Total </span></th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($order){
                        foreach ($order as $row){ 
                       $id = $row['pro_id'];
                       $product  = $dash->product($id);
                        ?>
                        <tr class="first odd">
                         <td><?php echo $row['order_id']?></td>
                         <?php if ($product){?>

                           <td><?php echo $product[0]['pro_name']?></td>
                           <?php if ($product[0]['pro_img']!=NULL): ?>
                             <td><img src='../images/<?php echo $product[0]['pro_img'];?>' height='100' width='100'/></td>
                           <?php endif; ?>

                        <?php }
                        else{
                         echo "<td class='text-danger'>Cannot view product, it has been deleted!</td>
                              <td class='text-danger'>Cannot view product, it has been deleted!</td>";
                       }?>


                         <td><span class="price">$<?php echo $row['grandTotal']?></span></td>
                         <td><?php echo $row['order_date']?></td>
                       </tr>

                     <?php } } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="box-account">
                <div class="page-title">
                  <h2>Account Information</h2>
                </div>
                <div class="col2-set">
                  <div class="col-1">
                    <h5>Contact Information</h5>
                    <p><?php echo $customerInfo[0]['cust_num']?><br>
                       <?php echo $customerInfo[0]['cust_email']?><br>
                    </p>
                      <a href="editAccount.php">Edit</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
}
else {
  $error = "Please login to see your order history.";
    echo "<div style='background:#000000;padding:50px;margin-bottom:20px'><h2 style='color:#d04e2e'>$error</h2>
    </div>";
    echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<td class='a-right last m-auto' colspan='50'><a href='login.php' class='btn btn-continue' style='background-color:#c2a476;color:white; margin-bottom:100px'><span>Login Here </span></a></td>";

}
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
