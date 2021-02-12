<?php
if(!isset($_SESSION))
 {
     session_start();

 }
include_once("../db_connection.php");

class Dash extends dbconnection {

  public function readOrderDetails($customerId){

    $query  = "SELECT orders.* , order_detail.* FROM order_detail
    INNER JOIN orders
    ON orders.order_id = order_detail.order_id
    WHERE orders.cust_id ={$customerId}";
    $result = $this->performQuery($query);
    return $this->fetchAll($result);
  }


  public function product($id){

    $query  = "SELECT * FROM product WHERE pro_id ={$id}";
    $result = $this->performQuery($query);
    return $this->fetchAll($result);
  }


}
$dash = new Dash();


?>
