<?php
session_start();

 include("header.php");
 include_once("productDetailClass.php");
 $pro_id  = $_GET['id'];
 $data    = $detail->readById($pro_id);
if($data){
 $catID   = $data[0]['cat_id'];
 $catName = $detail->getCatID($catID);
 $v_id    = $data[0]['v_id'];
 $vendor  = $detail->readVendor($v_id);

if(isset($_POST['submit']))
{
	$_SESSION['cart'][$pro_id] =$_POST['qty'];
  $add = "<p class='availability in-stock pull-right'><span>This Item Added To Your Cart</span></p>";
}

?>﻿
  <!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
  <?php echo"<li><a href='grid.php?id={$catID}'>{$catName[0]['cat_name']} Category</a></li>";?>
            <li><a href="#"><?php echo $data[0]['pro_name']?></a></li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End -->
  <!-- Main Container -->
  <section class="main-container col1-layout wow bounceInUp animated">
    <div class="main container">
      <div class="col-main">
        <div class="row">
          <div class="product-view">
            <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
            <div class="product-essential">
              <!-- <form action="#" method="post" id="product_addtocart_form"> -->
              <form action="" method="post" enctype="multipart/form-data">

                <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                <div class="product-img-box col-sm-4 col-xs-12">
                  <div class="new-label new-top-left"> New </div>
                  <div class="product-image">
              <?php echo"<div class='large-image'> <a href='../images/{$data[0]['pro_img']}' class='cloud-zoom' id='zoom1'> <img src='../images/{$data[0]['pro_img']}' alt='product image'> </a> </div>";?>

                  </div>


                </div>
                <div class="product-shop col-sm-8 col-xs-12">
                  <div class="product-name">
                    <h1><?php echo $data[0]['pro_name']?></h1>
                  </div>

                  <div class="price-block">
                    <div class="price-box">
                      <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price">$<?php echo $data[0]['pro_price']?></span> </p>
                    </div>
                    <p class="availability in-stock pull-right"><span>In Stock</span></p>
                  </div>
                  <div class="short-description">
                    <h3>Product Description</h3>
                    <p><?php echo $data[0]['pro_desc']?> </p>
                  </div>
                  <div class="short-description">
                    <h3>Contact Information</h3>
                    <p>Vendor Name: <?php echo $vendor[0]['v_name']?> </p>
                    <p>Phone Number: <?php echo $vendor[0]['v_num']?> </p>
                    <p>Location: <?php echo $vendor[0]['v_country']?> </p>
                  </div>
                  <div class="add-to-box">
                    <div class="add-to-cart">
                      <div class="pull-left">
                        <div class="custom pull-left">
                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                          <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                        </div>
                      </div>
                      <button name = 'submit' class='button btn-cart'>
                       Add to cart
                      </button>
                    </div>
                    <div class="email-addto-box">
                    
                      <?php if (isset($add)) {
                        echo $add;
                      }?>
                    </div>
                  </div>

                                  </div>
              </form>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Main Container End -->
   <hr><hr>
  <!-- Related Products Slider -->
  <section class="related-pro wow bounceInUp animated">
    <div class="container">
      <div class="slider-items-products">
        <div class="new_title center">
          <h2>Related Products</h2>
        </div>
        <div id="related-products-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
            <?php
            $cat_id  = $data[0]['cat_id'];
            $related = $detail->read($cat_id);
            if ($related) {
              foreach ($related as $row) {?>

                <div class="item">
                  <div class="item-inner">
                    <div class="item-img">
              <?php  echo"<div class='item-img-info'><a href='productDetail.php?id={$row['pro_id']}' title='Retis lapen casen' class='product-image'><img src='../images/{$row['pro_img']}' width='175' height='250' alt='Retis lapen casen'></a>";?>


                      </div>
                    </div>

                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title"><a href="#" title="Retis lapen casen"><?php echo $row['pro_name']?></a> </div>
                        <div class="item-content">
                          <div class="item-price">
                            <div class="price-box"><span class="regular-price"><span class="price">$<?php echo $row['pro_price']?></span> </span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } }?>

</div>
</div>
</div>
</div>
</section>

  <!-- Related Products Slider End -->


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
<?php } ?>
