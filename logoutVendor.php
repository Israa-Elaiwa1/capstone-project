<?php
session_start();
include_once("vendorClass.php");
$vendor->logOut();
$check  = $vendor->logedinCheck();
if (!($check)) {
  $vendor->reDirect("loginVendor.php");

}
?>
