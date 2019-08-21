<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/vendor_request.php';

$database = new Database();
$db = $database->getConnection();

$vendor_request = new Vendor_request($db);


// get posted data
$data = json_decode(file_get_contents("php://input"));

// set ID property of product to be edited
    $vendor_request->id = $data->id;

  
    if($vendor_request->delete()){
        http_response_code(200);
        echo json_encode(array("message" => " vendor_request was deleted."));
    }
     
    else{
        http_response_code(503);
        echo json_encode(array("message" => "Unable to delete vendor_request ."));
    }