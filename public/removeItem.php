<?php
session_start();
  $id = $_GET['id'];
  unset($_SESSION['cart'][$id]);?>
  <script type="text/javascript">
    window.location='allProducts.PHP';
  </script>
