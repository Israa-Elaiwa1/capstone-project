<?php
if(!isset($_SESSION))
 {
     session_start();

 }
include_once("../db_connection.php");

class Cart extends dbconnection {

  public function readById($key)
  {
    $query  = "SELECT * FROM product WHERE pro_id ={$key}";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function createOrder($date,$customerId,$grandTotal){

  $query   = "INSERT INTO orders(order_date, cust_id, grandTotal)
                          VALUES('$date' ,'$customerId', '$grandTotal')";
  $this->performQuery($query);
  $lastID = $this->conn->insert_id;


  foreach ($_SESSION['cart'] as $key => $value) {
    $v_id = $this->readById($key);
    $vendor_id= $v_id[0]['v_id'];
    $this->createOrderDetail($key,$value, $lastID, $vendor_id);
  }

  }

  public function createOrderDetail($key,$value, $lastID, $vendor_id){

  $query   = "INSERT INTO order_detail(pro_id, pro_quantity, order_id, v_id)
                          VALUES('$key', '$value','$lastID', '$vendor_id')";
  $result = $this->performQuery($query);
  
  }

}
$cart = new Cart();


?>
