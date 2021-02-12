<?php
include_once("../db_connection.php");

class grid extends dbconnection {

  public function readById($c_id)
  {
    $query  = "SELECT * FROM category WHERE cat_id ={$c_id}";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function readPro($c_id) //alphabatical order
  {
    $query  = "SELECT * FROM product WHERE cat_id ={$c_id} AND pro_status = 'active' ORDER BY pro_name ASC";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function readProP($c_id) //price order
  {
    $query  = "SELECT * FROM product WHERE cat_id ={$c_id} AND pro_status = 'active' ORDER BY pro_price DESC";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function readProN($c_id) //date order newest to oldest
  {
    $query  = "SELECT * FROM product WHERE cat_id ={$c_id} AND pro_status = 'active' ORDER BY pro_id DESC";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

public function read()
{
  $query  = "SELECT * FROM category";
  $result = $this->performQuery($query);
  return    $this->fetchAll($result);
}

public function readAllPro()
{
  $query  = "SELECT * FROM product WHERE pro_status = 'active' ORDER BY pro_name ASC";
  $result = $this->performQuery($query);
  return    $this->fetchAll($result);
}

public function readAllProP() //price order all products
{
  $query  = "SELECT * FROM product WHERE pro_status = 'active' ORDER BY pro_price DESC";
  $result = $this->performQuery($query);
  return    $this->fetchAll($result);
}

public function readAllProN() //date order newest to oldest all products
{
  $query  = "SELECT * FROM product WHERE pro_status = 'active' ORDER BY pro_id DESC";
  $result = $this->performQuery($query);
  return    $this->fetchAll($result);
}


}
$grid = new grid();


?>
