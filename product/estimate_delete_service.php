<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/estimate.php';

$database = new Database();
$db = $database->getConnection();

$estimate = new Estimate($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of product to be edited
$estimate->estimate_id = $data->estimate_id;

// update the product
if($estimate->delete()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "estimate was deleted."));
}
 
// if unable to update the product, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to delete estimate."));
}


?>