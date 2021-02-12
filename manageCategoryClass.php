<?php
include("db_connection.php");
class manageCategory extends dbconnection {
  public $name;
  public $image;

    public function create(){
      $query    = "INSERT INTO category (cat_name, cat_img)
                   VALUES('$this->name', '$this->image')";
      $this->performQuery($query);
    }
    public function read()
    {
        $query  = "SELECT * FROM category";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
    public function readById($id)
    {
        $query  = "SELECT * FROM category WHERE cat_id={$id}";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }

    public function delete($id)
    {
        $query  = "DELETE FROM category WHERE cat_id={$id}";
        $result = $this->performQuery($query);?>
        <script type="text/javascript">window.location='manageCategory.php'</script>
    <?php }
    public function edit($id)
    {
        $query = "UPDATE category SET cat_name  = '$this->name',
                                      cat_img   = '$this->image'
                                  WHERE cat_id={$id}" ;
        $this->performQuery($query);?>
        <script type="text/javascript">window.location='manageCategory.php'</script>
    <?php }

}
$cat = new manageCategory();
?>
