<?php
include_once("../db_connection.php");

class main extends dbconnection {

  public function read()
  {
    $query  = "SELECT * FROM category";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function readCat()
  {
    $query  = "SELECT * FROM category ORDER BY RAND()";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function bestSell() //make the limit 8 when you add pro
  {
    $query  = "SELECT pro_id, COUNT(*) AS count FROM order_detail
              GROUP BY pro_id
              ORDER BY count DESC
              LIMIT 5";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);

  }
  public function bestSellInfo($pro_id)
  {
    $query  = "SELECT * FROM product WHERE pro_id={$pro_id}";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function latestPro()
  {
    $query  = "SELECT * FROM product WHERE pro_status = 'active' ORDER BY pro_id DESC limit 4";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }
  public function contact ($name, $email, $question)
  {
    date_default_timezone_set("Asia/Amman");
    $date        = date('Y-m-d H:i:s');
   $query  = "INSERT INTO contact(name, email, contact_text, contact_date)
                          VALUES('$name', '$email', '$question' , '$date')";

   $result = $this->performQuery($query);

  }


}
$main = new main();


?>
