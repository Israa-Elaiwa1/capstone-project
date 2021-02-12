<?php
include("db_connection.php");
class vendorProduct extends dbconnection {
  public $name;
  public $desc;
  public $price;
  public $contact;
  public $v_id;
  public $image;
  public $cat;
  public $catName;

  public function create($v_id,$catName){

    $query  = "INSERT INTO product(pro_name, pro_desc, pro_price, v_id, pro_contact,pro_img,cat_id,pro_status)
                VALUES ('$this->name', '$this->desc', '$this->price', '$v_id', '$this->contact','$this->image','$catName','active')";
    $this->performQuery($query);
    }


  public function readById($id)
  {
    $query  = "SELECT * FROM product WHERE pro_id={$id}";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function getCat(){
    $query  = "SELECT * FROM category";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function myProducts($v_id){
    $query  = "SELECT * FROM product WHERE v_id={$v_id}";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function NumOfmyProducts($v_id){
    $query  = "SELECT COUNT(pro_id) AS num FROM product WHERE v_id={$v_id}";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }


  public function getCatID($catID){
    $query  = "SELECT * FROM category where cat_id={$catID}";
    $result = $this->performQuery($query);
    return    $this->fetchAll($result);
  }

  public function delete($id)
    {
    $query  = "DELETE FROM product WHERE pro_id={$id}";
    $result = $this->performQuery($query);?>
    <script type="text/javascript">window.location='vendorProduct.php'</script>
    <?php }

  public function edit($id)
    {
        $query = "UPDATE product SET  pro_name    = '$this->name',
                                      pro_desc    = '$this->desc',
                                      pro_price   = '$this->price',
                                      pro_contact = '$this->contact',
                                      cat_id      = '$this->cat',
                                      pro_img     = '$this->image'
                                  WHERE pro_id={$id}" ;
        $this->performQuery($query);?>
        <script type="text/javascript">window.location='vendorProduct.php'</script>
    <?php }


}
$product = new vendorProduct();
?>
