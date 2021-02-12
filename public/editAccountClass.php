<?php
include_once("../db_connection.php");
class Account extends dbconnection {

    public function readById($cust_id)
    {
        $query  = "SELECT * FROM customer WHERE cust_id={$cust_id}";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }

    public function editProfile($cust_id,$cust_name,$cust_email,$cust_password,$new_password,$new_password_confirm,$cust_num,$image)
    {
      $p2 = md5($new_password);
      $p3 = md5($new_password_confirm);

      if ($cust_password===$p2) {
        $error1="Your New Passwords Can not be Your Old Password!";
        return $error1;
      }
      else{
      if($p3!=$p2) {
        $error2="Your Passwords Do Not Match!";
        return $error2;
      }
      else{
        $query = "UPDATE customer SET cust_name     = '$cust_name',
                                      cust_email    = '$cust_email',
                                      cust_password    = '$p2',
                                      cust_num      = '$cust_num',
                                      cust_img      = '$image'
                                WHERE cust_id       = {$cust_id}" ;
        $this->performQuery($query);
        echo"<script type='text/javascript'>window.location='index.php'</script>";
      }
    }
   }

}
$account = new Account();
?>
