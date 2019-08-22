<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/estimate.php';

$database = new Database();
$db = $database->getConnection();

$estimate = new Estimate($db);

$stmt = $estimate->read();
$num = $stmt->rowCount();


if($num>0){ 

    $products_arr=array();
    $products_arr["estimate"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "estimate_id" => $estimate_id,
            "user_id" => $user_id,
            "moving_from" => $moving_from,
            "moving_to" => $moving_to,
            "moving_on" => $moving_on,
            "property_size" => $property_size,
            "old_floor_no" => $old_floor_no,
            "new_floor_no" => $new_floor_no,
            "old_elevator_availability" => $old_elevator_availability,
            "new_elevator_availability" => $new_elevator_availability,
            "old_parking_distance" => $old_parking_distance,
            "new_parking_distance" => $new_parking_distance,
            "items" => $items,
            "total_items" => $total_items,
            "service_type" => $service_type,
            "notification_sent" => $notification_sent,
            "status" => $status,
            "date_created" => $date_created

        );
        array_push($products_arr["estimate"], $product_item);
    }
     http_response_code(200);
     echo json_encode($products_arr);
}
 
else{
    http_response_code(404);
     echo json_encode(
        array("message" => "No services found.")
    );
}

?>