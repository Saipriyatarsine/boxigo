<?php
class  Estimate{
    private $conn;
    private $table_name = "estimate";
 
    public $estimate_id;
    public $user_id;
    public $moving_from;
    public $moving_to;
    public $moving_on;
    public $property_size;
    public $old_floor_no;
    public $new_floor_no;
    public $old_elevator_availability;
    public $new_elevator_availability;
    public $old_parking_distance;
    public $new_parking_distance;
    public $items;
    public $total_items;
    public $service_type;
    public $notification_sent;
    public $status;
    public $date_created;
    
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
                  estimate_id=:estimate_id,
                  user_id=:user_id,
                  moving_from=:moving_from,
                  moving_to=:moving_to,
                  moving_on=:moving_on,
                  property_size=:property_size,
                  old_floor_no=:old_floor_no,
                  new_floor_no=:new_floor_no,
                  old_elevator_availability=:old_elevator_availability,
                  new_elevator_availability=:new_elevator_availability,
                  old_parking_distance=:old_parking_distance,
                  new_parking_distance=:new_parking_distance,
                  items=:items,
                  total_items=:total_items,
                  service_type=:service_type,
                  notification_sent=:notification_sent,
                  status=:status,
                  date_created=:date_created";
  
     $stmt = $this->conn->prepare($query);

     // sanitize
     $this->estimate_id=htmlspecialchars(strip_tags($this->estimate_id));
     $this->user_id=htmlspecialchars(strip_tags($this->user_id));
     $this->moving_from=htmlspecialchars(strip_tags($this->moving_from));
     $this->moving_to=htmlspecialchars(strip_tags($this->moving_to));
     $this->moving_on=htmlspecialchars(strip_tags($this->moving_on));
     $this->property_size=htmlspecialchars(strip_tags($this->property_size));
     $this->old_floor_no=htmlspecialchars(strip_tags($this->old_floor_no));
     $this->new_floor_no=htmlspecialchars(strip_tags($this->new_floor_no));
     $this->old_elevator_availability=htmlspecialchars(strip_tags($this->old_elevator_availability));
     $this->new_elevator_availability=htmlspecialchars(strip_tags($this->new_elevator_availability));
     $this->old_parking_distance=htmlspecialchars(strip_tags($this->old_parking_distance));
     $this->new_parking_distance=htmlspecialchars(strip_tags($this->new_parking_distance));
     $this->items=htmlspecialchars(strip_tags($this->items));
     $this->total_items=htmlspecialchars(strip_tags($this->total_items));
     $this->service_type=htmlspecialchars(strip_tags($this->service_type));
     $this->notification_sent=htmlspecialchars(strip_tags($this->notification_sent));
     $this->status=htmlspecialchars(strip_tags($this->status));
     $this->date_created=htmlspecialchars(strip_tags($this->date_created));
 

     // bind new values
     $stmt->bindParam(":estimate_id", $this->estimate_id);
     $stmt->bindParam(":user_id", $this->user_id);
     $stmt->bindParam(":moving_from", $this->moving_from);
     $stmt->bindParam(":moving_to", $this->moving_to);
     $stmt->bindParam(":moving_on", $this->moving_on);
     $stmt->bindParam(":property_size", $this->property_size);
     $stmt->bindParam(":old_floor_no", $this->old_floor_no);
     $stmt->bindParam(":new_floor_no", $this->new_floor_no);
     $stmt->bindParam(":old_elevator_availability", $this->old_elevator_availability);
     $stmt->bindParam(":new_elevator_availability", $this->new_elevator_availability);
     $stmt->bindParam(":old_parking_distance", $this->old_parking_distance);
     $stmt->bindParam(":new_parking_distance", $this->new_parking_distance);
     $stmt->bindParam(":items", $this->items);
     $stmt->bindParam(":total_items", $this->total_items);
     $stmt->bindParam(":service_type", $this->service_type);
     $stmt->bindParam(":notification_sent", $this->notification_sent);
     $stmt->bindParam(":status", $this->status);
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
                  user_id=:user_id,
                  moving_from=:moving_from,
                  moving_to=:moving_to,
                  moving_on=:moving_on,
                  property_size=:property_size,
                  old_floor_no=:old_floor_no,
                  new_floor_no=:new_floor_no,
                  old_elevator_availability=:old_elevator_availability,
                  new_elevator_availability=:new_elevator_availability,
                  old_parking_distance=:old_parking_distance,
                  new_parking_distance=:new_parking_distance,
                  items=:items,
                  total_items=:total_items,
                  service_type=:service_type,
                  notification_sent=:notification_sent,
                  status=:status,
                  date_created=:date_created
             WHERE
             estimate_id=:estimate_id";
  
     // prepare query statement
     $stmt = $this->conn->prepare($query);
  
     // sanitize
     $this->estimate_id=htmlspecialchars(strip_tags($this->estimate_id));
     $this->user_id=htmlspecialchars(strip_tags($this->user_id));
     $this->moving_from=htmlspecialchars(strip_tags($this->moving_from));
     $this->moving_to=htmlspecialchars(strip_tags($this->moving_to));
     $this->moving_on=htmlspecialchars(strip_tags($this->moving_on));
     $this->property_size=htmlspecialchars(strip_tags($this->property_size));
     $this->old_floor_no=htmlspecialchars(strip_tags($this->old_floor_no));
     $this->new_floor_no=htmlspecialchars(strip_tags($this->new_floor_no));
     $this->old_elevator_availability=htmlspecialchars(strip_tags($this->old_elevator_availability));
     $this->new_elevator_availability=htmlspecialchars(strip_tags($this->new_elevator_availability));
     $this->old_parking_distance=htmlspecialchars(strip_tags($this->old_parking_distance));
     $this->new_parking_distance=htmlspecialchars(strip_tags($this->new_parking_distance));
     $this->items=htmlspecialchars(strip_tags($this->items));
     $this->total_items=htmlspecialchars(strip_tags($this->total_items));
     $this->service_type=htmlspecialchars(strip_tags($this->service_type));
     $this->notification_sent=htmlspecialchars(strip_tags($this->notification_sent));
     $this->status=htmlspecialchars(strip_tags($this->status));
     $this->date_created=htmlspecialchars(strip_tags($this->date_created));

  
   // bind new values
   $stmt->bindParam(":estimate_id", $this->estimate_id);
   $stmt->bindParam(":user_id", $this->user_id);
   $stmt->bindParam(":moving_from", $this->moving_from);
   $stmt->bindParam(":moving_to", $this->moving_to);
   $stmt->bindParam(":moving_on", $this->moving_on);
   $stmt->bindParam(":property_size", $this->property_size);
   $stmt->bindParam(":old_floor_no", $this->old_floor_no);
   $stmt->bindParam(":new_floor_no", $this->new_floor_no);
   $stmt->bindParam(":old_elevator_availability", $this->old_elevator_availability);
   $stmt->bindParam(":new_elevator_availability", $this->new_elevator_availability);
   $stmt->bindParam(":old_parking_distance", $this->old_parking_distance);
   $stmt->bindParam(":new_parking_distance", $this->new_parking_distance);
   $stmt->bindParam(":items", $this->items);
   $stmt->bindParam(":total_items", $this->total_items);
   $stmt->bindParam(":service_type", $this->service_type);
   $stmt->bindParam(":notification_sent", $this->notification_sent);
   $stmt->bindParam(":status", $this->status);
   $stmt->bindParam(":date_created", $this->date_created);

  
 
     // execute the query
     if($stmt->execute()){
         return true;
     }
  
     return false;
 }
 
 function delete(){
  
     // delete query
     $query = "DELETE FROM " . $this->table_name . " WHERE estimate_id = ?";
  
     // prepare query
     $stmt = $this->conn->prepare($query);
  
     // sanitize
     $this->estimate_id=htmlspecialchars(strip_tags($this->estimate_id));
  
     // bind id of record to delete
     $stmt->bindParam(1, $this->estimate_id);
  
     // execute query
     if($stmt->execute()){
         return true;
     }
  
     return false;
      
 }
 
 }
?>