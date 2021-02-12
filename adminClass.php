<?php
if(!isset($_SESSION))
 {
     session_start();
 }

include_once("db_connection.php");
class Admin extends dbconnection{
    public $admin_email;
    public $admin_password;

    public function login($admin_email,$admin_password)
    {
            $query    = "SELECT * FROM admin WHERE
                         admin_email='$admin_email'
                         AND admin_password='$admin_password'";
            $result = $this->performQuery($query);
            $data   = $this->fetchAll($result);
            if($data){
                 $_SESSION['admin_id']=$data[0]['admin_id'];
                 $_SESSION['admin_email']=$data[0]['admin_email'];
                 $_SESSION['admin_name']=$data[0]['admin_name'];

                 return 1;
            }
            else{
                return 0;
            }
    }
    public function logedinCheck()
    {
            if($_SESSION['admin_id'])
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
      unset($_SESSION['admin_id']);
      unset($_SESSION['admin_email']);
      unset( $_SESSION['admin_name']);
  }


}
$admin=new Admin();

?>
