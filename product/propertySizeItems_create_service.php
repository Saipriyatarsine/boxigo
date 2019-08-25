<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/propertySizeItems.php';

$database = new Database();
$db = $database->getConnection();
 
$property_Size_Items = new PropertySizeItems($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

if(  
    !empty($data->move_size)&&
    !empty($data->item_id)&&
    !empty($data->quantity)){
        
    $property_Size_Items->move_size = $data->move_size;
    $property_Size_Items->item_id = $data->item_id;
    $property_Size_Items->quantity = $data->quantity;
    $property_Size_Items->created_date = date('Y-m-d H:i:s');
    $property_Size_Items->last_update_date = date('Y-m-d H:i:s');
    
    // create the property_Size_Items
    if($property_Size_Items->create()){
 
    // set response code - 201 created
    http_response_code(201);

    // tell the user
    echo json_encode(array("message" => "property_Size_Items was created."));
}

// if unable to create the property_Size_Items, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);
    echo json_encode(array("property_Size_Items" => $property_Size_Items));

    // tell the user
    echo json_encode(array("message" => "Unable to create property_Size_Items."));
}
    }
// tell the user data is incomplete
else{

// set response code - 400 bad request
http_response_code(400);

// tell the user
echo json_encode(array("message" => "Unable to create property_Size_Items. Data is incomplete."));

}
?>