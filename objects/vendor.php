<?php
class Vendor{
 
    // database connection and table name
    private $conn;
    private $table_name = "vendor";
 
    // object properties
    public $id;
    public $name;
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
    public $update_date;
    public $rate_card_detail;
 
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
                name=:name,
                business_name=:business_name,
                activation_date=:activation_date,
                contact_address=:contact_address,
                business_contact_no=:business_contact_no
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
                update_date=:update_date,
                rate_card_detail=:rate_card_detail";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->business_name=htmlspecialchars(strip_tags($this->business_name));
    $this->activation_date=(strip_tags($this->activation_date));
    $this->contact_address=htmlspecialchars(strip_tags($this->contact_address));
    $this->business_contact_no=htmlspecialchars(strip_tags($this->business_contact_no));
    $this->category=htmlspecialchars(strip_tags($this->category));
    $this->merchant_status=htmlspecialchars(strip_tags($this->merchant_status));
    $this->contract_status=htmlspecialchars(strip_tags($this->contract_status));
    $this->name_as_per_gst=htmlspecialchars(strip_tags($this->name_as_per_gst));
    $this->GSTIN_number=htmlspecialchars(strip_tags($this->GSTIN_number));
    $this->registered_address=htmlspecialchars(strip_tags($this->registered_address));
    $this->owner_name=htmlspecialchars(strip_tags($this->owner_name));
    $this->owner_email=htmlspecialchars(strip_tags($this->owner_email));
    $this->owner_phone=htmlspecialchars(strip_tags($this->owner_phone));
    $this->created_date=htmlspecialchars(strip_tags($this->created_date));
    $this->update_date=htmlspecialchars(strip_tags($this->update_date));
    $this->rate_card_detail=htmlspecialchars(strip_tags($this->rate_card_detail));
   
   
    // bind values
    $stmt->bindParam(":name", $this->name);
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
    $stmt->bindParam(":update_date", $this->update_date);
    $stmt->bindParam(":rate_card_detail", $this->rate_card_detail);
 
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