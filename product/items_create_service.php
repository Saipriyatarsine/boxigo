<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../objects/items.php';
 
$database = new Database();
$db = $database->getConnection();
 
$items = new Items($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->type) &&
    !empty($data->category) &&
    !empty($data->items)
){

 
    // set product property values
    $items->type = $data->type;
    $items->category = $data->category;
    $items->sub_category = $data->sub_category;
    $items->items = $data->items;
    $items->created_date = date('Y-m-d H:i:s');
    $items->last_update_date = date('Y-m-d H:i:s');
 
    // create the product
    if($items->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "Item was Added."));
    }
 
    // if unable to create the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to Add the item."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to Add Item. Data is incomplete."));
}
?>