<?php
class Vendor{
 
    private $conn;
    private $table_name = "vendor";
 
    public $id;
    public $business_name;
    public $activation_date;
    public $contact_address;
    public $business_contact_no;
    public $category;
    public $merchant_status;
    public $contract_status;
    public $name_as_per_gst;
    public $GSTIN_number;
    public $registered_address;
    public $owner_name;
    public $owner_email;
    public $owner_phone;
    public $created_date;
    public $last_update_date;
    public $rate_card_detail;
 
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
                business_name=:business_name,
                activation_date=:activation_date,
                contact_address=:contact_address,
                business_contact_no=:business_contact_no,
                category=:category,
                merchant_status=:merchant_status,
                contract_status=:contract_status,
                name_as_per_gst=:name_as_per_gst,
                GSTIN_number=:GSTIN_number,
                registered_address=:registered_address,
                owner_name=:owner_name,
                owner_email=:owner_email,
                owner_phone=:owner_phone,
                created_date=:created_date,
                last_update_date=:last_update_date,
                rate_card_detail=:rate_card_detail";
 
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":business_name", $this->business_name);
    $stmt->bindParam(":activation_date", $this->activation_date);
    $stmt->bindParam(":contact_address", $this->contact_address);
    $stmt->bindParam(":business_contact_no", $this->business_contact_no);
    $stmt->bindParam(":category", $this->category);
    $stmt->bindParam(":merchant_status", $this->merchant_status);
    $stmt->bindParam(":contract_status", $this->contract_status);
    $stmt->bindParam(":name_as_per_gst", $this->name_as_per_gst);
    $stmt->bindParam(":GSTIN_number", $this->GSTIN_number);
    $stmt->bindParam(":registered_address", $this->registered_address);
    $stmt->bindParam(":owner_name", $this->owner_name);
    $stmt->bindParam(":owner_email", $this->owner_email);
    $stmt->bindParam(":owner_phone", $this->owner_phone);
    $stmt->bindParam(":created_date", $this->created_date);
    $stmt->bindParam(":last_update_date", $this->last_update_date);
    $stmt->bindParam(":rate_card_detail", $this->rate_card_detail);
 
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
            business_name=:business_name,
            activation_date=:activation_date,
            contact_address=:contact_address,
            business_contact_no=:business_contact_no,
            category=:category,
            merchant_status=:merchant_status,
            contract_status=:contract_status,
            name_as_per_gst=:name_as_per_gst,
            GSTIN_number=:GSTIN_number,
            registered_address=:registered_address,
            owner_name=:owner_name,
            owner_email=:owner_email,
            owner_phone=:owner_phone,
            created_date=:created_date,
            last_update_date=:last_update_date,
            rate_card_detail=:rate_card_detail
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // bind new values
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(":business_name", $this->business_name);
    $stmt->bindParam(":activation_date", $this->activation_date);
    $stmt->bindParam(":contact_address", $this->contact_address);
    $stmt->bindParam(":business_contact_no", $this->business_contact_no);
    $stmt->bindParam(":category", $this->category);
    $stmt->bindParam(":merchant_status", $this->merchant_status);
    $stmt->bindParam(":contract_status", $this->contract_status);
    $stmt->bindParam(":name_as_per_gst", $this->name_as_per_gst);
    $stmt->bindParam(":GSTIN_number", $this->GSTIN_number);
    $stmt->bindParam(":registered_address", $this->registered_address);
    $stmt->bindParam(":owner_name", $this->owner_name);
    $stmt->bindParam(":owner_email", $this->owner_email);
    $stmt->bindParam(":owner_phone", $this->owner_phone);
    $stmt->bindParam(":created_date", $this->created_date);
    $stmt->bindParam(":last_update_date", $this->last_update_date);
    $stmt->bindParam(":rate_card_detail", $this->rate_card_detail);
 
 
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