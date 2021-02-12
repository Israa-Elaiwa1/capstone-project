<?php
include_once("../db_connection.php");
class Detail extends dbconnection {

    public function readById($pro_id)
    {
        $query  = "SELECT * FROM product WHERE pro_id={$pro_id}";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }

    public function getCatID($catID){
      $query  = "SELECT * FROM category where cat_id={$catID}";
      $result = $this->performQuery($query);
      return    $this->fetchAll($result);
    }

    public function read($cat_id)//related products
    {
        $query  = "SELECT * FROM product WHERE cat_id={$cat_id} AND pro_status = 'active'";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }

    public function readVendor($v_id)
    {
        $query  = "SELECT * FROM vendor WHERE v_id={$v_id}";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }




}
$detail = new Detail();
?>
