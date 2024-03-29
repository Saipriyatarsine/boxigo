<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/serviceType.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$serviceType = new serviceType($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of product to be edited
$serviceType->id = $data->id;
 
// set product property values
$serviceType->name = $data->name;
$serviceType->display_name = $data->display_name;
$serviceType->service_info = json_encode(($data->service_info));
$serviceType->created_date = $data->created_date;
$serviceType->last_update_date = date('Y-m-d H:i:s');
 
// update the product
if($serviceType->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "Product was updated."));
}
 
// if unable to update the product, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update product."));
}
?>