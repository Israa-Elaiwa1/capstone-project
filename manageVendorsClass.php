<?php
include_once("db_connection.php");
class manageVendors extends dbconnection {


    public function read()
    {
        $query  = "SELECT * FROM vendor";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
    public function readById($id)
    {
        $query  = "SELECT * FROM vendor WHERE v_id={$id}";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }
    public function readPro($id)
    {
        $query2 = "SELECT * FROM product WHERE v_id={$id}";
        $result2 = $this->performQuery($query2);
        return $this->fetchAll($result2);
    }
    public function readProNum($id)
    {
        $query   = "SELECT COUNT(pro_id) AS num FROM product where v_id = $id";
        $result  = $this->performQuery($query);
        $num      = $this->fetchAll($result);
        return $num;
    }
    public function readCatName($id)
    {
        $query2 = "SELECT * FROM category WHERE cat_id={$id}";
        $result2 = $this->performQuery($query2);
        return $this->fetchAll($result2);
    }


    public function delete($id)
    {
        $query  = "DELETE FROM vendor WHERE v_id={$id}";
        $result = $this->performQuery($query);?>
        <script type="text/javascript">window.location='manageVendors.php'</script>
    <?php }
    public function edit($id,$status)
    {
        $query = "UPDATE vendor SET v_status  = '$status'
                                  WHERE v_id={$id}" ;
        $this->performQuery($query);?>
        <script type="text/javascript">window.location='manageVendors.php'</script>
    <?php }

    public function editProfile($v_id,$name,$email,$password,$new_pass,$new_pass_confirm,$num,$country,$image)
    {
      $p2 = md5($new_pass);
      $p3 = md5($new_pass_confirm);



      if ($password===$p2) {
        $error1="Your New Passwords Can not be Your Old Password!";
        return $error1;
      }
      else{
      if($p3!=$p2) {
        $error2="Your Passwords Do Not Match!";
        return $error2;
      }
      else{

        $query = "UPDATE vendor SET v_name     = '$name',
                                    v_email    = '$email',
                                    v_password = '$p2',
                                    v_num      = '$num',
                                    v_country  = '$country',
                                    v_img      =  '$image'
                                WHERE v_id   ={$v_id}" ;
        $this->performQuery($query);
        echo"<script type='text/javascript'>window.location='loginVendor.php'</script>";
      }
    }
   }

}
$mv = new manageVendors();
?>
