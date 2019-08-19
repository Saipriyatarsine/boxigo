<?php
class Items{
 
    // database connection and table name
    private $conn;
    private $table_name = "items";
 
    // object properties
    public $id;
    public $type;
    public $category;
    public $sub_category;
    public $items;
    public $created_date;
    public $last_update_date;
 
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

function create(){
 
 $query = "INSERT INTO
                " . $this->table_name ."
            SET
                type=:type, category=:category, sub_category=:sub_category, items=:items, created_date=:created_date, last_update_date=:last_update_date";
 
    $stmt = $this->conn->prepare($query);
 
    $stmt->bindParam(":type", $this->type);
    $stmt->bindParam(":category", $this->category);
    $stmt->bindParam(":sub_category", $this->sub_category);
    $stmt->bindParam(":items", $this->items);
    $stmt->bindParam(":created_date", $this->created_date);
    $stmt->bindParam(":last_update_date", $this->last_update_date);
 
    if($stmt->execute()){
        return true;
    } 

    return false; 
}

function update(){
 
    $query = "UPDATE
                " . $this->table_name . "
            SET
            type=:type, category=:category, sub_category=:sub_category, items=:items, created_date=:created_date, last_update_date=:last_update_date
            WHERE
                id = :id";
 
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(":type", $this->type);
    $stmt->bindParam(":category", $this->category);
    $stmt->bindParam(":sub_category", $this->sub_category);
    $stmt->bindParam(":items", $this->items);
    $stmt->bindParam(":created_date", $this->created_date);
    $stmt->bindParam(":last_update_date", $this->last_update_date);
 
    if($stmt->execute()){
        return true;
    }
 
    return false;
}

function delete(){
 
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
    $stmt = $this->conn->prepare($query); 
    $stmt->bindParam(1, $this->id);
 
    if($stmt->execute()){
        return true;
    }
 
    return false;     
}

}