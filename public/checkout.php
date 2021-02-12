<?php
session_start();

include("header.php");
include_once("shoppingCartClass.php");
include_once("loginMainClass.php");

if ($customer->logedinCheck()==false) {
echo"<script type='text/javascript'>window.location='login.php'</script>";
}
if ($customer->logedinCheck()==true){
$customerId  = $_SESSION['cust_id'];
date_default_timezone_set("Asia/Amman");
$date        = date('Y-m-d H:i:s');
$grandTotal  = $_GET['total'];
if (!empty($_SESSION['cart'])) {
  $create = $cart->createOrder($date,$customerId,$grandTotal);
}
else {
  $error = "Your Shopping Cart Is Empty!";
    echo "<div style='background:#FFDDDD;padding:50px;margin-bottom:20px'>".$error."
    </div>";
    echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<td class='a-right last m-auto' colspan='50'><a href='allProducts.php' class='btn btn-continue' style='background-color:#c2a476;color:white'><span>Continue Shopping</span></a></td>";
    die;
}
 }

?>
  <!-- Main Container -->
  <section class="main-container col2-right-layout bounceInUp animated">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-9">
          <div class="page-title">
            <h1>Checkout</h1>
          </div>
          <div class="container">
            <h1 class="text-center"style="color:#c2a476">Thank You For Shopping Here!</h1>
          </div>


          <div class="cart-collaterals row">

            <div class="col-sm-4">
              <div class="totals">
                <h3><?php echo $_SESSION['cust_name'];?>'s Bill</h3>
                <div class="inner">
                  <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                    <colgroup>
                    <col>
                    <col width="1">
                    </colgroup>
                    <tfoot>
                      <tr>

                        <td colspan="1" class="a-left"><strong>Grand Total</strong></td>
                        <td class="a-right"><strong><span class="price">$<?php echo $grandTotal?></span></strong></td>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>

          </div>



        </div>

      </div>
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
