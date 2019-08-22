<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/estimate.php';

$database = new Database();
$db = $database->getConnection();

$estimate = new Estimate($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

if(  
    !empty($data->estimate_id)&&
     !empty($data->user_id)&&
     !empty($data->moving_from)&&
     !empty($data->moving_to)&&
     !empty($data->moving_on)&&
     !empty($data->property_size)&&
     !empty($data->old_floor_no)&&
     !empty($data->new_floor_no)&&
     !empty($data->old_elevator_availability)&&
     !empty($data->new_elevator_availability)&&
     !empty($data->old_parking_distance)&&
     !empty($data->new_parking_distance)&&
     !empty($data->items)&&
     !empty($data->total_items)&&
     !empty($data->service_type)&&
     !empty($data->notification_sent)){
        
    $estimate->estimate_id = $data->estimate_id;
    $estimate->user_id = $data->user_id;
    $estimate->moving_from = $data->moving_from;
    $estimate->moving_to = $data->moving_to;
    $estimate->moving_on = $data->moving_on;
    $estimate->property_size = $data->property_size;
    $estimate->old_floor_no = $data->old_floor_no;
    $estimate->new_floor_no = $data->new_floor_no;
    $estimate->old_elevator_availability = $data->old_elevator_availability;
    $estimate->new_elevator_availability = $data->new_elevator_availability;
    $estimate->old_parking_distance = $data->old_parking_distance;
    $estimate->new_parking_distance = $data->new_parking_distance;
    $estimate->items = $data->items;
    $estimate->total_items = $data->total_items;
    $estimate->service_type = $data->service_type;
    $estimate->notification_sent = $data->notification_sent;
    $estimate->status = $data->status;
    $estimate->date_created = date('Y-m-d H:i:s');
    
    // create the estimate
    if($estimate->create()){
 
    // set response code - 201 created
    http_response_code(201);

    // tell the user
    echo json_encode(array("message" => "estimate was created."));
    }

    // if unable to create the estimate, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("estimate" => $estimate));

        // tell the user
        echo json_encode(array("message" => "Unable to create estimate."));
    }
        }
// tell the user data is incomplete
else{

// set response code - 400 bad request
http_response_code(400);

// tell the user
echo json_encode(array("message" => "Unable to create estimate. Data is incomplete."));

}
?>