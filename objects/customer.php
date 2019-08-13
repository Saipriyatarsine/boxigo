<?php
class ServiceType{
 
    // database connection and table name
    private $conn;
    private $table_name = "customers";
 
    // object properties
    public $user_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $verification_key;
    public $is_email_verified;
    public $is_phone_verified;
    public $date_created;
    public $last_updated;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

function read(){
 
    // select all query
    $query = "SELECT
                *
            FROM
                " . $this->table_name;
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

// create product
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name ."
            SET
                name=:name, display_name=:display_name, service_info=:service_info, created_date=:created_date, last_update_date=:last_update_date";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->display_name=htmlspecialchars(strip_tags($this->display_name));
    $this->service_info=(strip_tags($this->service_info));
    $this->created_date=htmlspecialchars(strip_tags($this->created_date));
    $this->last_update_date=htmlspecialchars(strip_tags($this->last_update_date));
 
    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":display_name", $this->display_name);
    $stmt->bindParam(":service_info", $this->service_info);
    $stmt->bindParam(":created_date", $this->created_date);
    $stmt->bindParam(":last_update_date", $this->last_update_date);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

// update the product
function update(){
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                name=:name, display_name=:display_name, service_info=:service_info, created_date=:created_date, last_update_date=:last_update_date
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->display_name=htmlspecialchars(strip_tags($this->display_name));
    $this->service_info=(strip_tags($this->service_info));
    $this->created_date=htmlspecialchars(strip_tags($this->created_date));
    $this->last_update_date=htmlspecialchars(strip_tags($this->last_update_date));
 
    // bind new values
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":display_name", $this->display_name);
    $stmt->bindParam(":service_info", $this->service_info);
    $stmt->bindParam(":created_date", $this->created_date);
    $stmt->bindParam(":last_update_date", $this->last_update_date);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}

}