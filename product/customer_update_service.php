<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/customer.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

$customer = new Customers($db);

 
// get posted data
$data = json_decode(file_get_contents("php://input"));

$customer->user_id = $data->user_id;
$customer->first_name = $data->first_name;
$customer->last_name = $data->last_name;
$customer->email = $data->email;
$customer->phone = $data->phone;
$customer->is_email_verified = $data->is_email_verified;
$customer->is_phone_verified = $data->is_phone_verified;
$customer->date_created = date('Y-m-d H:i:s');

// update the product
if($customer->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "Customer was updated."));
}
 
// if unable to update the product, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update Customer."));
}

?>