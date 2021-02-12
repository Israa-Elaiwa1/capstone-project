<?php
session_start();
include_once("adminClass.php");
$admin->logOut();
$check  = $admin->logedinCheck();
if (!($check)) {
$admin->reDirect("loginAdmin.php");
}
?>
