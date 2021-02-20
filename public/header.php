<?php
include_once("mainClass.php");
include_once("loginMainClass.php");
include_once("shoppingCartClass.php");


if ($customer->logedinCheck()==false) {
$log ="<div class='login'><a href='login.php'><span class='hidden-xs'>Log In</span></a></div>";
$msg ='Welcome To Our Store!';
}
elseif ($customer->logedinCheck()==true) {
$log ="<div class='login'><a href='logout.php'><span class='hidden-xs'>Log Out</span></a></div>";
$msg ='Welcome Back '.$_SESSION['cust_name'].'!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons Icon -->

<title>Superb premium HTML5 &amp; CSS3 template</title>

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="css/internal.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="all">
<link rel="stylesheet" type="text/css" href="css/simple-line-icons.css" media="all">
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
<link rel="stylesheet" type="text/css" href="css/revslider.css" >
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="css/flexslider.css">
<link rel="stylesheet" type="text/css" href="css/jquery.mobile-menu.css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,600,600italic,400italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>

<body class="customer-account-index customer-account inner-page">
<div id="page">

<!-- Header -->
<header>
  <div class="header-container">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <!-- Header Language -->
          <div class="col-xs-7 col-sm-6">
            <div class="dropdown block-language-wrapper hidden-xs"> <a role="button" class="block-language dropdown-toggle" href="#"> <img src="images/english.png" alt="language"> English  </a>

            </div>
            <!-- End Header Language -->

            <div class="welcome-msg hidden-xs"><?php echo $msg?></div>
          </div>
          <div class="col-xs-5 col-sm-6">

            <div class="top-cart-contain pull-right">
          <!-- Top Cart -->
          <div class="mini-cart">
            <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"><a href="#">  My Cart <span class="cart_count">2</span></a></div>
            <div>
              <div class="top-cart-content" style="display: none;">
                <!--block-subtitle-->
                <ul class="mini-products-list" id="cart-sidebar">

                    <?php
                    $grandTotal = 0;
                        if(isset($_SESSION['cart'])){

                        foreach ($_SESSION['cart'] as $key => $value) {
                          $info = $cart->readById($key);
                          if ($info) {
                              ?>

                          <li class="item first">
                            <div class="item-inner"><a class="product-image" title="timi &amp; leslie Sophia Diaper Bag, Lemon Yellow/Shadow White" href="#l"><img alt="timi &amp; leslie Sophia Diaper Bag, Lemon Yellow/Shadow White" src="../images/<?php echo $info[0]['pro_img']?>"></a>
                              <div class="product-details">
                                <!--access--> <strong><?php echo $value?></strong> x <span class="price">$<?php echo $info[0]['pro_price']?></span>
                                <p class="product-name"><a href="#"><?php echo $info[0]['pro_name']?></a></p>
                              </div>
                            </div>
                          </li>


                  <?php $grandTotal = $grandTotal+$value*$info[0]['pro_price'];

                     }
                    }
                  } ?>

                </ul>
                <div class="actions">
                  <?php echo"<a href ='checkout.php?total={$grandTotal}'><button class='btn-checkout' title='Checkout' type='button'><span>Checkout</span></button></a>";?>
                                   <a href="shoppingCart.php" class="view-cart" ><span>View Cart</span></a> </div>                <!--actions-->
              </div>
            </div>
          </div>
          <!-- Top Cart -->
          <div id="ajaxconfig_info" style="display:none"><a href="#/"></a>
            <input value="" type="hidden">
            <input id="enable_module" value="1" type="hidden">
            <input class="effect_to_cart" value="1" type="hidden">
            <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
          </div>
        </div>



            <!-- Header Top Links -->
            <div class="toplinks">
              <div class="links">

                <div class="myaccount"><a title="My Account" href="editAccount.php"><span class="hidden-xs">My Account</span></a></div>
                <div class="myaccount"><a title="My Account" href="dashboard.php"><span class="hidden-xs">My Orders</span></a></div>
                <div class="myaccount"><a title="My Account" href="shoppingCart.php"><span class="hidden-xs">My Cart</span></a></div>
                <div class="check"><a title="Be A Vendor" href="../vendorSignup.php"><span class="hidden-xs" style="color:#d04e2e">Become A Vendor</span></a></div>
                <!-- Header Company -->

                <!-- End Header Company -->

                <?php
                 echo $log;
                ?>

              </div>

            </div>
            <!-- End Header Top Links -->

          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- end header -->

<!-- Navbar -->
<nav>
  <div class="container">
        <!-- Header Logo -->
        <div class="logo"><a title="Datson" href="index.php"><img style="border-radius: 50%" alt="Datson" src="images/logo6.png" height="114" width="178"></a></div>
        <!-- End Header Logo -->

      <div class="mm-toggle-wrap">
        <div class="mm-toggle"><i class="fa fa-reorder"></i><span class="mm-label">Menu</span> </div>
      </div>

        <ul class="nav hidden-xs menu-item menu-item-left">
          <li class="level0 parent drop-menu active"><a href="index.php"><span>Home</span></a>

          </li>
          <li class="level0 parent drop-menu"><a href="#"><span>Categories</span> </a>
            <ul class="level1" style="display: none;">
              <li class='level1 first'><a href='allProducts.php'><span>All Products</span></a></li>
              <?php
              $data = $main->read();
              if ($data) {
               foreach ($data as $row) {
                echo"<li class='level1 first'><a href='grid.php?id={$row['cat_id']}'><span>{$row['cat_name']}</span></a></li>";
               }
              }
              ?>
            </ul>
          </li>


          </ul>
          <ul class="nav hidden-xs menu-item menu-item-right">
              <li class="mega-menu"><a class="level-top" href="aboutUs.php"><span>About Us</span></a>

          </li>
          <li class="level0 nav-8 level-top"><a href="#contactUs" class="level-top"><span>Contact Us</span></a></li>

        </ul>
    </div>
</nav>
