<?php
session_start();
include_once("loginMainClass.php");
$customer->logOut();
$check  = $customer->logedinCheck();
if (!($check)) {
$customer->reDirect("login.php");
}
?>
