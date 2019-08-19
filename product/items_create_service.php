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
    $items->type = $data->type;
    $items->category = $data->category;
    $items->sub_category = $data->sub_category;
    $items->items = $data->items;
    $items->created_date = date('Y-m-d H:i:s');
    $items->last_update_date = date('Y-m-d H:i:s');
 
    if($items->create()){
 
        http_response_code(201);
        echo json_encode(array("message" => "Item was Added."));
    }
 
    else{
 
        http_response_code(503);
        echo json_encode(array("message" => "Unable to Add the item."));
    }
}
 
else{
 
    http_response_code(400);
    echo json_encode(array("message" => "Unable to Add Item. Data is incomplete."));
}
?>