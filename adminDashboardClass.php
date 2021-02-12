<?php
include_once("db_connection.php");
class Admin extends dbconnection {

    public function read()
    {
        $query  = "SELECT * FROM vendor ORDER BY v_id DESC limit 5";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }

    public function numOfVendors()
    {
        $query  = "SELECT COUNT(v_id) AS num FROM vendor";
        $result = $this->performQuery($query);
        $num    = $this->fetchAll($result);
        return $num;
    }

    public function numOfProducts()
    {
        $query  = "SELECT COUNT(pro_id) AS num FROM product";
        $result = $this->performQuery($query);
        $num    = $this->fetchAll($result);
        return $num;
    }


        public function numOfCustomers()
        {
            $query  = "SELECT COUNT(cust_id) AS num FROM customer";
            $result = $this->performQuery($query);
            $num    = $this->fetchAll($result);
            return $num;
        }

        public function readMessage()
        {
            $query  = "SELECT * FROM contact ORDER BY contact_date DESC";
            $result = $this->performQuery($query);
            return    $this->fetchAll($result);
        }




}
$ad = new Admin();
?>
