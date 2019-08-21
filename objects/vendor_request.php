<?php
class Vendor_request{
 
    private $conn;
    private $table_name = "vendor_request";
 
    public $id;
    public $name;
    public $email;
    public $phone;
    public $business_name;
    public $business_contact_no;
    public $business_website_url;
    public $verification_key;
    public $is_phone_verified;
    public $accept_terms_conditions;
    public $created_date;
    public $last_update_date;
    
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

function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name ."
            SET
                name=:name,
                email=:email,
                phone=:phone,
                business_name=:business_name,
                business_contact_no=:business_contact_no,
                business_website_url=:business_website_url,
                verification_key=:verification_key,
                is_phone_verified=:is_phone_verified,
                legally_authorised=:legally_authorised,
                accept_terms_conditions=:accept_terms_conditions,
                created_date=:created_date,
                last_update_date=:last_update_date";
 
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->name = htmlspecialchars (strip_tags($this->name));
    $this->email = htmlspecialchars (strip_tags($this->email));
    $this->phone = htmlspecialchars (strip_tags($this->phone));
    $this->business_name = htmlspecialchars (strip_tags($this->business_name));
    $this->business_contact_no = htmlspecialchars (strip_tags($this->business_contact_no));
    $this->business_website_url = htmlspecialchars (strip_tags($this->business_website_url));
    $this->verification_key = htmlspecialchars (strip_tags($this->verification_key));
    $this->is_phone_verified = htmlspecialchars (strip_tags($this->is_phone_verified));
    $this->legally_authorised = htmlspecialchars (strip_tags($this->legally_authorised));
    $this->accept_terms_conditions = htmlspecialchars (strip_tags($this->accept_terms_conditions));
    $this->created_date = htmlspecialchars (strip_tags($this->created_date));
    $this->last_update_date = htmlspecialchars (strip_tags($this->last_update_date));


    //bindParam
    
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":phone", $this->phone);
    $stmt->bindParam(":business_name", $this->business_name);
    $stmt->bindParam(":business_contact_no", $this->business_contact_no);
    $stmt->bindParam(":business_website_url", $this->business_website_url);
    $stmt->bindParam(":verification_key", $this->verification_key);
    $stmt->bindParam(":is_phone_verified", $this->is_phone_verified);
    $stmt->bindParam(":legally_authorised", $this->legally_authorised);
    $stmt->bindParam(":accept_terms_conditions", $this->accept_terms_conditions);
    $stmt->bindParam(":created_date", $this->created_date);
    $stmt->bindParam(":last_update_date", $this->last_update_date);
 
    if($stmt->execute()){
        return true;
    }
    return false;
     
}

function update(){
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
            name=:name,
            email=:email,
            phone=:phone,
            business_name=:business_name,
            business_contact_no=:business_contact_no,
            business_website_url=:business_website_url,
            verification_key=:verification_key,
            is_phone_verified=:is_phone_verified,
            legally_authorised=:legally_authorised,
            accept_terms_conditions=:accept_terms_conditions,
            created_date=:created_date,
            last_update_date=:last_update_date
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->id = htmlspecialchars(strip_tags($this->id));
    $this->name = htmlspecialchars (strip_tags($this->name));
    $this->email = htmlspecialchars (strip_tags($this->email));
    $this->phone = htmlspecialchars (strip_tags($this->phone));
    $this->business_name = htmlspecialchars (strip_tags($this->business_name));
    $this->business_contact_no = htmlspecialchars (strip_tags($this->business_contact_no));
    $this->business_website_url = htmlspecialchars (strip_tags($this->business_website_url));
    $this->verification_key = htmlspecialchars (strip_tags($this->verification_key));
    $this->is_phone_verified = htmlspecialchars (strip_tags($this->is_phone_verified));
    $this->legally_authorised = htmlspecialchars (strip_tags($this->legally_authorised));
    $this->accept_terms_conditions = htmlspecialchars (strip_tags($this->accept_terms_conditions));
    $this->created_date = htmlspecialchars (strip_tags($this->created_date));
    $this->last_update_date = htmlspecialchars (strip_tags($this->last_update_date));
 
    // bind new values
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":phone", $this->phone);
    $stmt->bindParam(":business_name", $this->business_name);
    $stmt->bindParam(":business_contact_no", $this->business_contact_no);
    $stmt->bindParam(":business_website_url", $this->business_website_url);
    $stmt->bindParam(":verification_key", $this->verification_key);
    $stmt->bindParam(":is_phone_verified", $this->is_phone_verified);
    $stmt->bindParam(":legally_authorised", $this->legally_authorised);
    $stmt->bindParam(":accept_terms_conditions", $this->accept_terms_conditions);
    $stmt->bindParam(":created_date", $this->created_date);
    $stmt->bindParam(":last_update_date", $this->last_update_date);
 
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}

function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
    
    return false;   
}

}