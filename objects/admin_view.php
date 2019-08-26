<?php
class Admin_Dashboard{
    // database connection and table name
    private $conn;
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    } 
    // Customer count function
    function Customer_count(){

        $query = "SELECT 'customers' as Type, count(*) as total from customers 
        union all 
        SELECT 'vendor_request' as Type, count(*) as total from vendor_request 
        union all 
        SELECT 'vendor' as Type, count(*) as total from vendor  ";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
}
?>