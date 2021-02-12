<?php
include("db_connection.php");
class manageProduct extends dbconnection {

    public function read()
    {
        $query  = "SELECT * FROM product";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
    public function readById($id)
    {
        $query  = "SELECT * FROM product WHERE pro_id={$id}";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }

    public function readCat($id)
    {
        $query  = "SELECT cat_name FROM category WHERE cat_id={$id}";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
    public function readVendor($id)
    {
        $query  = "SELECT v_name FROM vendor WHERE v_id={$id}";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }

    public function delete($id)
    {
        $query  = "DELETE FROM product WHERE pro_id={$id}";
        $result = $this->performQuery($query);?>
        <script type="text/javascript">window.location='manageProduct.php'</script>
    <?php }


    public function edit($id,$status)
    {
        $query = "UPDATE product SET pro_status  = '$status'
                                  WHERE pro_id={$id}" ;
        $this->performQuery($query);?>
        <script type="text/javascript">window.location='manageProduct.php'</script>
    <?php }

}
$pro = new manageProduct();
?>
