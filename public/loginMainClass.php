<?php
if(!isset($_SESSION))
 {
     session_start();
 }

include_once("../db_connection.php");
class customer extends dbconnection{
    public $cust_email;
    public $cust_password;

    public function login($cust_email,$cust_password)
    {
      $p = md5($cust_password);
            $query    = "SELECT * FROM customer WHERE
                         cust_email='$cust_email'
                         AND cust_password='$p'";
            $result = $this->performQuery($query);
            $data   = $this->fetchAll($result);
            if($data){
                 $_SESSION['cust_id']=$data[0]['cust_id'];
                 $_SESSION['cust_email']=$data[0]['cust_email'];
                 $_SESSION['cust_name']=$data[0]['cust_name'];
                 return 1;
            }
            else{
                return 0;
            }
    }

        public function signup($email,$password,$password2,$name,$num,$image)
       {
           $query  = "select * FROM customer WHERE cust_email = '$email'";
           $result = $this->performQuery($query);
           $data   = $this->fetchAll($result);
           if($data){
               $error1="This Email Already Exists!";
               return $error1;
           }
           else{
           if($password!=$password2){
               $error2="Passwords Don't match!";
               return $error2;
           }
           else{
               $p = md5($password);
               $q = "INSERT INTO customer(cust_email, cust_password, cust_name, cust_num,cust_img)
                       VALUES('$email','$p', '$name','$num','$image')";
                       $this->performQuery($q);
                       return "successfull";
          }
          }
        }

    public function logedinCheck()
    {
      if (!isset($_SESSION['cust_id']) || $_SESSION['cust_id'] != true)
      {
        return false;
      }
      else {
        return true;
      }

    }
    public function reDirect($url)
    {
        header("location:".$url);
    }
    public function logOut()
  {
      unset($_SESSION['cust_id']);
      unset($_SESSION['cust_email']);
      unset( $_SESSION['cust_name']);
      unset( $_SESSION['cart']);

  }


}
$customer=new customer();

?>
