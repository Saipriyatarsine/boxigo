<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/rate_card_details.php';

$database = new Database();
$db = $database->getConnection();

$rate_card_details = new Rate_Card_Details($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

$rate_card_details->id = $data->id;
$rate_card_details->vendor_id = $data->vendor_id;
$rate_card_details->valid_from = $data->valid_from;
$rate_card_details->valid_to = $data->valid_to;
$rate_card_details->type = $data->type;
$rate_card_details->detail = $data->detail;
$rate_card_details->created_date = date('Y-m-d H:i:s');
$rate_card_details->last_update_date = date('Y-m-d H:i:s');

// update the product
if($rate_card_details->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "rate_card_details was updated."));
}
 
// if unable to update the product, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update rate_card_details."));
}
?>