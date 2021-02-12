<?php
if(!isset($_SESSION))
 {
     session_start();
 }

include_once("db_connection.php");
class Vendor extends dbconnection{
    public $vendor_email;
    public $vendor_password;

    public function login($vendor_email,$vendor_password)
    {
      $p = md5($vendor_password);
            $query    = "SELECT * FROM vendor WHERE
                         v_email='$vendor_email'
                         AND v_password='$p'
                         AND v_status  = 'active'";
            $result = $this->performQuery($query);
            $data   = $this->fetchAll($result);
            if($data){
                 $_SESSION['vendor_id']=$data[0]['v_id'];
                 $_SESSION['vendor_email']=$data[0]['v_email'];
                 $_SESSION['vendor_name']=$data[0]['v_name'];

                 return 1;
            }
            else{
                return 0;
            }
    }

    public function signup($email,$password,$confirm,$name,$num,$image,$country)
   {
       $query  = "select * FROM vendor WHERE v_email = '$email'";
       $result = $this->performQuery($query);
       $data   = $this->fetchAll($result);
       if($data){
           $error1="This Email Already Exists!";
           return $error1;
       }
       else{
       if($password!=$confirm){
           $error2="Passwords Don't match!";
           return $error2;
       }
       else{
         $p = md5($password);
           $q = "INSERT INTO vendor(v_email, v_password, v_name, v_num,v_img, v_country, v_status)
                   VALUES
                   ('$email','$p', '$name',
                   '$num','$image','$country', 'pending')";
                   $this->performQuery($q);
                   return "successfull";
      }
      }
    }

    public function logedinCheck()
    {
            if($_SESSION['vendor_id'])
            {
                return true;
            }
            else
            {
                return false;
            }
    }
    public function reDirect($url)
    {
        header("location:".$url);
    }
    public function logOut()
  {
      unset($_SESSION['vendor_id']);
      unset($_SESSION['vendor_email']);
      unset( $_SESSION['vendor_name']);
  }


}
$vendor=new Vendor();

?>
