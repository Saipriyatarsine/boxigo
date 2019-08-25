<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/propertySizeItems.php';
 
$database = new Database();
$db = $database->getConnection();
 
$propertySizeItems = new PropertySizeItems($db);

$propertySizeItems->id = $data->id;
$propertySizeItems->move_size = $data->move_size;
$propertySizeItems->item_id = $data->item_id;
$propertySizeItems->quantity = $data->quantity;
$propertySizeItems->created_date = date('Y-m-d H:i:s');
$propertySizeItems->last_update_date = date('Y-m-d H:i:s');

// update the product
if($propertySizeItems->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "propertySizeItems was updated."));
}
 
// if unable to update the product, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update propertySizeItems."));
}
?>