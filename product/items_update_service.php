<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/items.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$items = new Items($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of product to be edited
$items->id = $data->id;
 
// set product property values
$items->type = $data->type;
$items->category = $data->category;
$items->sub_category = $data->sub_category;
$items->items = $data->items;
$items->created_date = $data->created_date;
$items->last_update_date = date('Y-m-d H:i:s');
 
// update the product
if($items->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "Item was updated."));
}
 
// if unable to update the product, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update the Item."));
}
?>