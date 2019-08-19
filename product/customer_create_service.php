<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/customer.php';

$database = new Database();
$db = $database->getConnection();
 
$customer = new Customers($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

if(  
    !empty($data->user_id)&&
    !empty($data->first_name)&&
    !empty($data->last_name)&&
    !empty($data->email)&&
    !empty($data->phone)){
        
    $customer->user_id = $data->user_id;
    $customer->first_name = $data->first_name;
    $customer->last_name = $data->last_name;
    $customer->email = $data->email;
    $customer->phone = $data->phone;
    $customer->verification_key = $data->verification_key;
    $customer->is_email_verified = $data->is_email_verified;
    $customer->is_phone_verified = $data->is_phone_verified;
    $customer->date_created = date('Y-m-d H:i:s');
    
    // create the customer
    if($customer->create()){
 
    // set response code - 201 created
    http_response_code(201);

    // tell the user
    echo json_encode(array("message" => "customer was created."));
}

// if unable to create the customer, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);
    echo json_encode(array("Customer" => $customer));

    // tell the user
    echo json_encode(array("message" => "Unable to create customer."));
}
    }
// tell the user data is incomplete
else{

// set response code - 400 bad request
http_response_code(400);

// tell the user
echo json_encode(array("message" => "Unable to create customer. Data is incomplete."));

}
?>