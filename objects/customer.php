<?php

class Customers{
 
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
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

function read(){
 
 $query = "SELECT
                *
            FROM
                " . $this->table_name;
 
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}

// create product
function create(){

   // try {
 
    $query = "INSERT INTO
                " . $this->table_name ."
            SET
                 user_id=:user_id,
                 first_name=:first_name,
                 last_name=:last_name,
                 email=:email,
                 phone=:phone,
                 verification_key=:verification_key,
                 is_email_verified=:is_email_verified,
                 is_phone_verified=:is_phone_verified,
                 date_created=:date_created";
 
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->user_id=htmlspecialchars(strip_tags($this->user_id));
    $this->first_name=htmlspecialchars(strip_tags($this->first_name));
    $this->last_name=htmlspecialchars(strip_tags($this->last_name));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->phone=htmlspecialchars(strip_tags($this->phone));
    $this->verification_key=htmlspecialchars(strip_tags($this->verification_key));
    $this->is_email_verified=htmlspecialchars(strip_tags($this->is_email_verified));
    $this->is_phone_verified=htmlspecialchars(strip_tags($this->is_phone_verified));
    $this->date_created=htmlspecialchars(strip_tags($this->date_created));


    // bind new values
    $stmt->bindParam(":user_id", $this->user_id);
    $stmt->bindParam(":first_name", $this->first_name);
    $stmt->bindParam(":last_name", $this->last_name);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":phone", $this->phone);
    $stmt->bindParam(":verification_key", $this->verification_key);
    $stmt->bindParam(":is_email_verified", $this->is_email_verified);
    $stmt->bindParam(":is_phone_verified", $this->is_phone_verified);
    $stmt->bindParam(":date_created", $this->date_created);
        
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
            first_name=:first_name,
            last_name=:last_name,
            email=:email,
            phone=:phone,
            verification_key=:verification_key,
            is_email_verified=:is_email_verified,
            is_phone_verified=:is_phone_verified,
            date_created=:date_created
            WHERE
            user_id=:user_id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->user_id=htmlspecialchars(strip_tags($this->user_id));
    $this->first_name=htmlspecialchars(strip_tags($this->first_name));
    $this->last_name=htmlspecialchars(strip_tags($this->last_name));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->phone=htmlspecialchars(strip_tags($this->phone));
    $this->verification_key=htmlspecialchars(strip_tags($this->verification_key));
    $this->is_email_verified=htmlspecialchars(strip_tags($this->is_email_verified));
    $this->is_phone_verified=htmlspecialchars(strip_tags($this->is_phone_verified));
    $this->date_created=htmlspecialchars(strip_tags($this->date_created));
 
    // bind new values
    $stmt->bindParam(":user_id", $this->user_id);
    $stmt->bindParam(":first_name", $this->first_name);
    $stmt->bindParam(":last_name", $this->last_name);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":phone", $this->phone);
    $stmt->bindParam(":verification_key", $this->verification_key);
    $stmt->bindParam(":is_email_verified", $this->is_email_verified);
    $stmt->bindParam(":is_email_verified", $this->is_email_verified);
    $stmt->bindParam(":is_phone_verified", $this->is_phone_verified);
    $stmt->bindParam(":date_created", $this->date_created);
 

    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}

function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE user_id = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->user_id=htmlspecialchars(strip_tags($this->user_id));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->user_id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

}