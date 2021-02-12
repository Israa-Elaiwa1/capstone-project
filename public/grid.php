<?php
 include_once("header.php");
 include_once("gridClass.php");
 include_once("shoppingCartClass.php");

 $c_id = $_GET['id'];
 $data = $grid->readById($c_id);
?>
  <!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href='#'><?php echo $data[0]['cat_name'];?></a></li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End -->

  <!-- Main Container -->
  <section class="main-container col2-left-layout bounceInUp animated">
    <div class="container">
      <div class="row">
        <div class="col-main col-sm-9 col-sm-push-3">
          <div class="category-description std">
            <div class="slider-items-products">
              <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col1 owl-carousel owl-theme">

                  <!-- Item -->
                  <!-- put images feom category itself -->
                  <div class="item"> <a href="#"><img alt="" src="../images/<?php echo $data[0]['cat_img']?>" height="400" width ="1000"></a>
                    <div class="cat-img-title cat-bg cat-box">
                      <div class="small-tag"><span>Hot Sale</span> 30% OFF</div>
                      <h2 class="cat-heading"><?php echo $data[0]['cat_name'];?> Category</h2>
                    </div>
                  </div>
                  <!-- End Item -->

                </div>
              </div>
            </div>
          </div>
          <?php
          //sort by name
          $action = isset($_GET['action']) ? $_GET['action'] : 'dash';
            if($action=='dash')
            {?>
          <article class="col-main">
            <div class="page-title">
              <h1><?php echo $data[0]['cat_name'];?></h1>
            </div>
            <div class="toolbar">
              <div class="sorter">
                <div class="view-mode"> <span title="Grid" class="button button-active button-grid">&nbsp;</span> </div>
              </div>
              <div id="sort-by">
                <label class="left">Sort By: </label>
                <ul>
                  <li><a href="#">Alphabatical<span class="right-arrow"></span></a>
                    <ul><?php
                echo"
                      <li><a href='grid.php?id={$c_id}&action=price'>price</a></li>
                      <li><a href='grid.php?id={$c_id}&action=new'>Newest</a></li>";
                      ?>
                    </ul>
                  </li>
                </ul>
                </div>

            </div>
            <div class="category-products">
              <ul class="products-grid">

                <!-- php code goes here -->
                <?php
                $product = $grid->readPro($c_id);
                if ($product) {
                  foreach ($product as $row) {?>

                    <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                      <div class="item-inner">
                        <div class="item-img">
                <?php echo"<div class='item-img-info'><a href='productDetail.php?id={$row['pro_id']}' title='Retis lapen casen' class='product-image'><img src='../images/{$row['pro_img']}' alt='Product Image' height='275' width='250'></a>";?>
                            <div class="actions">
                              <div class="quick-view-btn"><a href="#" data-toggle="modal" data-target="#e<?php echo $row['pro_id']?>" type="button"> <span>Quick View</span></a></div>

                            </div>

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
                    </li>


                      <!-- Modal -->
                      <div class="modal fade" id="e<?php echo $row['pro_id']?>" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Quick View</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">

                              <div id="fancybox-overlay">
                                <div id="fancybox-wrap">
                                  <div id="fancybox-outer">
                                    <div id="fancybox-content"> <a href="index.html"></a>
                                      <div>
                                        <div class="product-view">
                                          <div class="product-essential">
                                            <form action="#" method="post" id="product_addtocart_form">
                                              <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                                              <div class="product-img-box col-sm-5 col-xs-12">
                                                <div class="new-label new-top-left"> New </div>
                                                <!--  product info-->
                                                <div class="product-image">
                                          <?php echo"<div class='large-image'> <a href='products-images/product.jpg' class='cloud-zoom' id='zoom1' rel='useWrapper: false, adjustY:0, adjustX:20'> <img src='../images/{$row['pro_img']}'> </a> </div>";?>
                                                </div>
                                              </div>
                                              <div class="product-shop col-sm-7 col-xs-12">
                                                <div class="product-name">
                                                  <h2><?php echo $row['pro_name']?></h2>
                                                  <p class="availability in-stock pull-right"><span>In Stock</span></p>
                                                </div>
                                                <div class="price-block">
                                                  <div class="price-box">
                                                    <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> $<?php echo $row['pro_price']?> </span> </p>
                                                  </div>
                                                </div>
                                                <div class="short-description">
                                                  <h2>Quick Overview</h2>
                                                  <p><?php echo $row['pro_desc']?></p>
                                                </div>
                                                <div class="add-to-box">
                                                  <div class="email-addto-box">
                                                    <ul class="add-to-links">
                                                  <?php echo"<a href='productDetail.php?id={$row['pro_id']}' style='display:inline'><button onClick='productAddToCartForm.submit(this)' class='button btn-cart' title='Add to Cart' type='button'></button></a>";?>
                                                    </ul>
                                                  </div>
                                                </div>

                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                        <!--product-view-->

                                      </div>
                                    </div>
                                    <a id="fancybox-close" href="index.html"></a> </div>
                                </div>
                              </div>
                              <!-- end of theme -->

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div>

                        </div>
                      </div>
                      <!-- end of modal -->

            <?php }
                }
                ?>


                <!-- end of modal -->


              </ul>
            </div>
          </article>
        <?php }
        //end of sort be name


        //sort by price
        elseif ($action=='price') { ?>
          <article class="col-main">
            <div class="page-title">
              <h1><?php echo $data[0]['cat_name'];?></h1>
            </div>
            <div class="toolbar">
              <div class="sorter">
                <div class="view-mode"> <span title="Grid" class="button button-active button-grid">&nbsp;</span> </div>
              </div>
              <div id="sort-by">
                <label class="left">Sort By: </label>
                <ul>
                  <li><a href="#">Price<span class="right-arrow"></span></a>
                    <ul><?php
                    echo"
                          <li><a href='grid.php?id={$c_id}&action=price'>price</a></li>
                          <li><a href='grid.php?id={$c_id}&action=new'>Newest</a></li>";
                      ?>
                    </ul>
                  </li>
                </ul>
                </div>

            </div>
            <div class="category-products">
              <ul class="products-grid">

                <?php
                $product = $grid->readProP($c_id);
                if ($product) {
                  foreach ($product as $row) {?>

                    <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                      <div class="item-inner">
                        <div class="item-img">
                          <?php echo"<div class='item-img-info'><a href='productDetail.php?id={$row['pro_id']}' title='Retis lapen casen' class='product-image'><img src='../images/{$row['pro_img']}' alt='Product Image' height='275' width='250'></a>";?>
                            <div class="actions">
                              <div class="quick-view-btn"><a href="#" data-toggle="modal" data-target="#e<?php echo $row['pro_id']?>" type="button"> <span>Quick View</span></a></div>

                            </div>

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
                    </li>

                    <!-- Modal -->
                    <div class="modal fade" id="e<?php echo $row['pro_id']?>" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Quick View</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">

                            <div id="fancybox-overlay">
                              <div id="fancybox-wrap">
                                <div id="fancybox-outer">
                                  <div id="fancybox-content"> <a href="index.html"></a>
                                    <div>
                                      <div class="product-view">
                                        <div class="product-essential">
                                          <form action="#" method="post" id="product_addtocart_form">
                                            <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                                            <div class="product-img-box col-sm-5 col-xs-12">
                                              <div class="new-label new-top-left"> New </div>
                                              <!--  product info-->
                                              <div class="product-image">
                                        <?php echo"<div class='large-image'> <a href='products-images/product.jpg' class='cloud-zoom' id='zoom1' rel='useWrapper: false, adjustY:0, adjustX:20'> <img src='../images/{$row['pro_img']}'> </a> </div>";?>
                                              </div>
                                            </div>
                                            <div class="product-shop col-sm-7 col-xs-12">
                                              <div class="product-name">
                                                <h2><?php echo $row['pro_name']?></h2>
                                                <p class="availability in-stock pull-right"><span>In Stock</span></p>
                                              </div>
                                              <div class="price-block">
                                                <div class="price-box">
                                                  <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> $<?php echo $row['pro_price']?> </span> </p>
                                                </div>
                                              </div>
                                              <div class="short-description">
                                                <h2>Quick Overview</h2>
                                                <p><?php echo $row['pro_desc']?></p>
                                              </div>
                                              <div class="add-to-box">

                                                <div class="email-addto-box">
                                                  <ul class="add-to-links">
                                                    <?php echo"<a href='productDetail.php?id={$row['pro_id']}' style='display:inline'><button onClick='productAddToCartForm.submit(this)' class='button btn-cart' title='Add to Cart' type='button'></button></a>";?>
                                                  </ul>
                                                </div>
                                              </div>

                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                      <!--product-view-->

                                    </div>
                                  </div>
                                  <a id="fancybox-close" href="index.html"></a> </div>
                              </div>
                            </div>
                            <!-- end of theme -->

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- end of modal -->

            <?php }
                }
                ?>
              </ul>
            </div>
          </article>

  <?php  }
  //end of sort by price

  //sort by date
  elseif ($action=='new') { ?>
    <article class="col-main">
      <div class="page-title">
        <h1><?php echo $data[0]['cat_name'];?></h1>
      </div>
      <div class="toolbar">
        <div class="sorter">
          <div class="view-mode"> <span title="Grid" class="button button-active button-grid">&nbsp;</span> </div>
        </div>
        <div id="sort-by">
          <label class="left">Sort By: </label>
          <ul>
            <li><a href="#">Newest<span class="right-arrow"></span></a>
              <ul><?php
              echo"
                    <li><a href='grid.php?id={$c_id}&action=price'>price</a></li>
                    <li><a href='grid.php?id={$c_id}&action=new'>Newest</a></li>";
                ?>
              </ul>
            </li>
          </ul>
           </div>

      </div>
      <div class="category-products">
        <ul class="products-grid">

          <?php
          $product = $grid->readProN($c_id);
          if ($product) {
            foreach ($product as $row) {?>

              <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                <div class="item-inner">
                  <div class="item-img">
                    <?php echo"<div class='item-img-info'><a href='productDetail.php?id={$row['pro_id']}' title='Retis lapen casen' class='product-image'><img src='../images/{$row['pro_img']}' alt='Product Image' height='275' width='250'></a>";?>
                      <div class="actions">
                        <div class="quick-view-btn"><a href="#" data-toggle="modal" data-target="#e<?php echo $row['pro_id']?>" type="button"> <span>Quick View</span></a></div>

                      </div>

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
              </li>

              <!-- Modal -->
              <div class="modal fade" id="e<?php echo $row['pro_id']?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Quick View</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                      <div id="fancybox-overlay">
                        <div id="fancybox-wrap">
                          <div id="fancybox-outer">
                            <div id="fancybox-content"> <a href="index.html"></a>
                              <div>
                                <div class="product-view">
                                  <div class="product-essential">
                                    <form action="#" method="post" id="product_addtocart_form">
                                      <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                                      <div class="product-img-box col-sm-5 col-xs-12">
                                        <div class="new-label new-top-left"> New </div>
                                        <!--  product info-->
                                        <div class="product-image">
                                  <?php echo"<div class='large-image'> <a href='products-images/product.jpg' class='cloud-zoom' id='zoom1' rel='useWrapper: false, adjustY:0, adjustX:20'> <img src='../images/{$row['pro_img']}'> </a> </div>";?>
                                        </div>
                                      </div>
                                      <div class="product-shop col-sm-7 col-xs-12">
                                        <div class="product-name">
                                          <h2><?php echo $row['pro_name']?></h2>
                                          <p class="availability in-stock pull-right"><span>In Stock</span></p>
                                        </div>
                                        <div class="price-block">
                                          <div class="price-box">
                                            <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> $<?php echo $row['pro_price']?> </span> </p>
                                          </div>
                                        </div>
                                        <div class="short-description">
                                          <h2>Quick Overview</h2>
                                          <p><?php echo $row['pro_desc']?></p>
                                        </div>
                                        <div class="add-to-box">
                                          <div class="email-addto-box">
                                            <ul class="add-to-links">
                                        <?php echo"<a href='productDetail.php?id={$row['pro_id']}' style='display:inline'><button onClick='productAddToCartForm.submit(this)' class='button btn-cart' title='Add to Cart' type='button'></button></a>";?>
                                            </ul>
                                          </div>
                                        </div>

                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <!--product-view-->

                              </div>
                            </div>
                            <a id="fancybox-close" href="index.html"></a> </div>
                        </div>
                      </div>
                      <!-- end of theme -->

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
              <!-- end of modal -->


      <?php }
          }
          ?>
        </ul>
      </div>
    </article>

<?php  }
//end of sort by date

        ?>
          <!--	///*///======    End article  ========= //*/// -->
        </div>
        <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
          <aside class="col-left sidebar">
            <div class="side-nav-categories">
              <div class="block-title"> Categories </div>
              <!--block-title-->
              <!-- BEGIN BOX-CATEGORY -->
              <div class="box-content box-category">
                <ul>
                  <?php
                  $cat = $main->read();
                  if ($cat) {
                   foreach ($cat as $row) {

              echo"<li> <a class='active' href='grid.php?id={$row['cat_id']}'>$row[cat_name]</a> <span class='subDropdown'>»</span>
                  </li>";
                }}
                  ?>
                </ul>

              </div>
              <!--box-content box-category-->
            </div>

            <div class="block block-cart">
              <div class="block-title ">My Cart</div>
              <div class="block-content">

                <p class="block-subtitle">Recently added item(s) </p>
                <ul>

               <?php
                  $grandTotal = 0;
                  $count = 0;
                        if(isset($_SESSION['cart'])){

                        foreach ($_SESSION['cart'] as $key => $value) {
                          $info = $cart->readById($key);
                          if ($info) {

                          ?>

                          <li class="item"> <a href="#" title="Retis lapen casen" class="product-image"><img  src="../images/<?php echo $info[0]['pro_img']?>"></a>
                            <div class="product-details">
                              <div class="access"> <a href=<?php echo"removeItem.php?id=$key"?> title="Remove This Item" class="btn-remove1"> <span class="icon"></span> Remove </a> </div>
                              <strong><?php echo $value?></strong> x <span class="price">$<?php echo $info[0]['pro_price']?></span>
                              <p class="product-name"> <a href="#"><?php echo $info[0]['pro_name']?></a> </p>
                            </div>
                          </li>


                          <?php  $grandTotal = $grandTotal+$value*$info[0]['pro_price'];
                                 $count      = $count+1;
                            ?>
              <?php }   
                     }
                      }

                ?>

                </ul>

                <div class="summary">
                  <p class="amount">There are <a href="#"><?php echo $count;?> items</a> in your cart.</p>
                  <p class="subtotal"> <span class="label">Cart Total:</span> <span class="price">$<?php echo $grandTotal?></span> </p>
                </div>
                <div class="ajax-checkout">
              <?php echo" <td class='a-right last' colspan='50'><a href='checkout.php?total={$grandTotal}' class='btn btn-continue' style='background-color:#c2a476;color:white'><span>Check Out</span></a></td>";?>
                </div>


              </div>
            </div>


          </aside>
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
<script type="text/javascript" src="js/revslider.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>
<script type='text/javascript'>
        jQuery(document).ready(function(){
            jQuery('#rev_slider_4').show().revolution({
                dottedOverlay: 'none',
                delay: 5000,
                startwidth: 0,
                startheight: 800,

                hideThumbs: 200,
                thumbWidth: 200,
                thumbHeight: 50,
                thumbAmount: 2,

                navigationType: 'thumb',
                navigationArrows: 'solo',
                navigationStyle: 'round',

                touchenabled: 'on',
                onHoverStop: 'on',

                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,

                spinner: 'spinner0',
                keyboardNavigation: 'off',

                navigationHAlign: 'center',
                navigationVAlign: 'bottom',
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: 'left',
                soloArrowLeftValign: 'center',
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: 'right',
                soloArrowRightValign: 'center',
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: 'on',
                fullScreen: 'off',

                stopLoop: 'off',
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: 'off',

                autoHeight: 'off',
                forceFullWidth: 'on',
                fullScreenAlignForce: 'off',
                minFullScreenHeight: 0,
                hideNavDelayOnMobile: 1500,

                hideThumbsOnMobile: 'off',
                hideBulletsOnMobile: 'off',
                hideArrowsOnMobile: 'off',
                hideThumbsUnderResolution: 0,

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                fullScreenOffsetContainer: ''
            });
        });
        </script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>
</html>
