<?php
class PropertySizeItems{
 
    // database connection and table name
    private $conn;
    private $table_name = "property_size_items";
 
    // object properties
    public $id;
    public $move_size;
    public $item_id;
    public $quantity;
    public $created_date;
    public $last_update_date;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

function search($keywords){

    // select all query
    $query = "SELECT
                *
            FROM
                " . $this->table_name . " p
            WHERE
                p.move_size like ? ";
    
    // prepare query statement
    $stmt = $this->conn->prepare($query);
    
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
    
    // bind
    $stmt->bindParam(1, $keywords);
    // execute query
    $stmt->execute();
    
    return $stmt;
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
            move_size=:move_size,
            item_id=:item_id,
            quantity=:quantity,
            created_date=:created_date,
            last_update_date=:last_update_date";
 
    // prepare query
    $stmt = $this->conn->prepare($query);


    // sanitize
    $this->move_size=htmlspecialchars(strip_tags($this->move_size));
    $this->item_id=htmlspecialchars(strip_tags($this->item_id));
    $this->quantity=htmlspecialchars(strip_tags($this->quantity));
    $this->created_date=htmlspecialchars(strip_tags($this->created_date));
    $this->last_update_date=htmlspecialchars(strip_tags($this->last_update_date));
 
    // bind values
    $stmt->bindParam(":move_size", $this->move_size);
    $stmt->bindParam(":item_id", $this->item_id);
    $stmt->bindParam(":quantity", $this->quantity);
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
            move_size=:move_size, item_id=:item_id, quantity=:quantity, created_date=:created_date, last_update_date=:last_update_date
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
     // sanitize
     $this->id = htmlspecialchars(strip_tags($this->id));
     $this->move_size=htmlspecialchars(strip_tags($this->move_size));
     $this->item_id=htmlspecialchars(strip_tags($this->item_id));
     $this->quantity=htmlspecialchars(strip_tags($this->quantity));
     $this->created_date=htmlspecialchars(strip_tags($this->created_date));
     $this->last_update_date=htmlspecialchars(strip_tags($this->last_update_date));

    // bind new values
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(":move_size", $this->move_size);
    $stmt->bindParam(":item_id", $this->item_id);
    $stmt->bindParam(":quantity", $this->quantity);
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