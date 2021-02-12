<?php
include("db_connection.php");
class manageCustomer extends dbconnection {

    public function read()
    {
        $query  = "SELECT * FROM customer";
        $result = $this->performQuery($query);
        return    $this->fetchAll($result);
    }

    public function numOfPro($id)
    {
        $query  = "SELECT COUNT(order_id) AS num FROM orders where cust_id = $id";
        $result = $this->performQuery($query);
        $num    = $this->fetchAll($result);
        return $num;
    }

    public function delete($id)
    {
        $query  = "DELETE FROM customer WHERE cust_id={$id}";
        $result = $this->performQuery($query);?>
        <script type="text/javascript">window.location='manageCustomer.php'</script>
    <?php }


}
$mc = new manageCustomer();
?>
