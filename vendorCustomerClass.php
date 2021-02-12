<?php
include_once("db_connection.php");
class vendorCustomer extends dbconnection {

  public function readV($id)
  {
    $query  = "SELECT * FROM order_detail WHERE v_id={$id}";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function readOrder($order_id)
  {
    $query  = "SELECT * FROM orders WHERE order_id={$order_id}";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function readC($cust_id)
  {
    $query  = "SELECT * FROM customer WHERE cust_id={$cust_id}";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

//vendor dashboard

  public function numOfOrders($v_id)
  {
    $query  = "SELECT COUNT(order_id ) AS num FROM order_detail WHERE v_id={$v_id}";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function mostWanted($v_id){

    $query  = "SELECT pro_id, COUNT(*) AS most FROM order_detail WHERE v_id={$v_id}
              GROUP BY pro_id
              ORDER BY most DESC
              LIMIT 1";
    $result = $this->performQuery($query);
    if ($result!=NULL) {
      return    $this->fetchAll($result);
    }
    else {
      return false;
    }
  }

  public function productsInfo($pro_id)
  {
    $query  = "SELECT * FROM product WHERE pro_id={$pro_id}";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }


}
$Vcustomer = new vendorCustomer();
?>
