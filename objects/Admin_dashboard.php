<?php
class Admin_Dashboard{
    // database connection and table name
    private $conn;
    private $Customer_table_name = "customers";
    private $Vendor_table_name = "vendor";
    private $Vendor_Request_table_name = "vendor_request";

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    

 
    // select "customers" as Type, count(*) as total from customers union all
    // Customer count function
    function Customer_count(){
        $query = "SELECT 'customers' as Type, COUNT(*) as total  FROM " . $this->Customer_table_name ;
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    // Vendor count function
    function Vendor_count(){
        $query = "SELECT 'Vendor' as Type, COUNT(*) as total  FROM " . $this->Vendor_table_name ;
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    // Vendor_Request count function 
    function Vendor_Request_count(){
        $query = "SELECT 'Vendor_Request' as Type, COUNT(*) as total  FROM " . $this->Vendor_Request_table_name ;
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}
?>