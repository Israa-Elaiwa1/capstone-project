<?php
if(!isset($_SESSION))
 {
     session_start();
 }
 include_once("vendorClass.php");
 if ($vendor->logedinCheck()==false) {
   $vendor->reDirect('loginVendor.php');
 }
?>

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">

                        <div class="row">
                          <div class="col-2">
                         <img src="plugins/images/logo-light-icon.png" alt="homepage" />
                       </div>
                        <div class="col-2">
                        <h2 class='ml-2 mt-1 text-light'>Vendors</h2>
                      </div>
                      </div>

                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                    href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <!-- </div> -->
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <ul class="navbar-nav d-none d-md-block d-lg-none">
                    <li class="nav-item">
                        <a class="nav-toggler nav-link waves-effect waves-light text-white"
                            href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    </li>
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav ml-auto d-flex align-items-center">

                    <!-- ============================================================== -->
                    <!-- Search Admin Info -->
                    <!-- ============================================================== -->
                

                    <li>
                        <a class="profile-pic" href="#">
                        <span class="text-white font-medium"><?php echo $_SESSION['vendor_name']?></span></a>
                    </li>
                    <li>
                        <a class="profile-pic" href="logoutVendor.php">
                         <span class="text-white font-medium">Logout<i class="fas fa-power-off ml-2"></i></span></a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
