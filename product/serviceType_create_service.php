<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../objects/serviceType.php';
 
$database = new Database();
$db = $database->getConnection();
 
$serviceType = new ServiceType($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->name) &&
    !empty($data->display_name) &&
    !empty($data->service_info)
){

 
    // set product property values
    $serviceType->name = $data->name;
    $serviceType->display_name = $data->display_name;
    $serviceType->service_info = json_encode(($data->service_info));
    $serviceType->created_date = date('Y-m-d H:i:s');
    $serviceType->last_update_date = date('Y-m-d H:i:s');
 
    // create the product
    if($serviceType->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "Service Type was created."));
    }
 
    // if unable to create the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create Service Type."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create Service Type. Data is incomplete."));
}
?>