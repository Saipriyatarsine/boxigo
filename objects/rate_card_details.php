<?php
class Rate_Card_Details{
    private $conn;
    private $table_name = 'rate_card_details';

    public $id;
    public $vendor_id;
    public $valid_from;
    public $valid_to;
    public $type;
    public $detail;
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

// create product
function create(){

    // try {
  
     $query = "INSERT INTO
                 " . $this->table_name ."
             SET
                  vendor_id=:vendor_id,
                  valid_from=:valid_from,
                  valid_to=:valid_to,
                  type=:type,
                  detail=:detail,
                  created_date=:created_date,
                  last_update_date=:last_update_date";
  
     $stmt = $this->conn->prepare($query);

     // sanitize
     $this->vendor_id=htmlspecialchars(strip_tags($this->vendor_id));
     $this->valid_from=htmlspecialchars(strip_tags($this->valid_from));
     $this->valid_to=htmlspecialchars(strip_tags($this->valid_to));
     $this->type=htmlspecialchars(strip_tags($this->type));
     $this->detail=htmlspecialchars(strip_tags($this->detail));
     $this->created_date=htmlspecialchars(strip_tags($this->created_date));
     $this->last_update_date=htmlspecialchars(strip_tags($this->last_update_date));
     

     // bind new values
     $stmt->bindParam(":vendor_id", $this->vendor_id);
     $stmt->bindParam(":valid_from", $this->valid_from);
     $stmt->bindParam(":valid_to", $this->valid_to);
     $stmt->bindParam(":type", $this->type);
     $stmt->bindParam(":detail", $this->detail);
     $stmt->bindParam(":created_date", $this->created_date);
     $stmt->bindParam(":last_update_date", $this->last_update_date);
      
     // execute query
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
            vendor_id=:vendor_id,
            valid_from=:valid_from,
            valid_to=:valid_to,
            type=:type,
            detail=:detail,
            created_date=:created_date,
            last_update_date=:last_update_date
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    
     // sanitize
     $this->id=htmlspecialchars(strip_tags($this->id));
     $this->vendor_id=htmlspecialchars(strip_tags($this->vendor_id));
     $this->valid_from=htmlspecialchars(strip_tags($this->valid_from));
     $this->valid_to=htmlspecialchars(strip_tags($this->valid_to));
     $this->type=htmlspecialchars(strip_tags($this->type));
     $this->detail=htmlspecialchars(strip_tags($this->detail));
     $this->created_date=htmlspecialchars(strip_tags($this->created_date));
     $this->last_update_date=htmlspecialchars(strip_tags($this->last_update_date));
     

     // bind new values
     $stmt->bindParam(":id",$this->id);
     $stmt->bindParam(":vendor_id", $this->vendor_id);
     $stmt->bindParam(":valid_from", $this->valid_from);
     $stmt->bindParam(":valid_to", $this->valid_to);
     $stmt->bindParam(":type", $this->type);
     $stmt->bindParam(":detail", $this->detail);
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
?>