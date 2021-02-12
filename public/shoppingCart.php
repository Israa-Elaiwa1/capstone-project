<?php
session_start();
   include("header.php");
   include_once("shoppingCartClass.php");
   $action = isset($_GET['action']) ? $_GET['action'] : 'dash';
     if($action=='dash')
     {
?>
  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          <div class="page-title">
            <h1>Shopping Cart</h1>
          </div>
          <div class="table-responsive">
            <form method="post" action="#">
              <fieldset>
                <table class="data-table cart-table" id="shopping-cart-table">

                  <thead>
                    <tr class="first last">
                      <th rowspan="1">&nbsp;</th>
                      <th rowspan="1"><span class="nobr">Product Name</span></th>
                      <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                      <th class="a-center " rowspan="1">Qty</th>
                      <th colspan="1" class="a-center">Subtotal</th>
                      <th colspan="1" class="a-center">Remove</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="first last">
                        <td class="a-right last" colspan="50"><a href='allProducts.php' class="btn btn-continue" style="background-color:#c2a476;color:white"><span>Continue Shopping</span></a></td>

                    </tr>
                  </tfoot>

            <?php $grandTotal = 0;
                  if(isset($_SESSION['cart'])){

                  foreach ($_SESSION['cart'] as $key => $value) {
                    $info = $cart->readById($key);
                    if ($info) {


                    ?>


                    <tbody>
                      <tr class="first odd">
                        <td class="image"><a class="product-image" title="" href="#"><img width="75" height="75"  src="../images/<?php echo $info[0]['pro_img']?>"></a></td>
                        <td><h2 class="product-name"> <a href="#"><?php echo $info[0]['pro_name']?></a> </h2></td>
                        <td class="a-center hidden-table"><span class="cart-price"> <span class="price">$<?php echo $info[0]['pro_price']?></span> </span></td>
                        <td class="a-center movewishlist"><input maxlength="12" class="input-text qty" title="Qty" size="4" value="<?php echo $value?>" name="" readonly></td>
                        <td class="a-center movewishlist"><span class="cart-price"> <span class="price">$<?php echo $value*$info[0]['pro_price']?></span> </span></td>
                     <td class="a-center last"><a class="button remove-item" title="Remove item" href=<?php echo"shoppingCart.php?action=remove&id={$key}"?>><span><span>Remove item</span></span></a></td>
                      </tr>
                    </tbody>

                  <?php  $grandTotal= $grandTotal+$value*$info[0]['pro_price'];


                ?>

    <?php    }  
              }
                }
       ?>

                </table>
              </fieldset>
            </form>
          </div>
          <!-- BEGIN CART COLLATERALS -->
          <div class="cart-collaterals row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
              <div class="totals">
                <h3>Shopping Cart Total</h3>
                <div class="inner">
                  <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                    <colgroup>
                    <col>
                    <col width="1">
                    </colgroup>
                    <tfoot>
                      <tr>
                        <td colspan="1" class="a-left"><strong>Grand Total</strong></td>
                        <td class="a-right"><strong><span class="price">$<?php echo $grandTotal;?></span></strong></td>
                      </tr>
                    </tfoot>
                  </table>
                  <br>
                  <br>
                  <ul class="checkout">
                    <li>

            <?php echo "<a href='checkout.php?total={$grandTotal}'><button class='button btn-proceed-checkout' title='Proceed to Checkout' type='button'><span>Proceed to Checkout</span></button></a>";?>

                    </li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
            </div>
          </div>

          <!--cart-collaterals-->

        </div>
      </div>
    </div>
  </section>

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
<?php }
elseif ($action=='remove') {
  $id = $_GET['id'];
  unset($_SESSION['cart'][$id]);?>
  <script type="text/javascript">
  window.location='shoppingCart.php';
  </script>
<?php }
 ?>
