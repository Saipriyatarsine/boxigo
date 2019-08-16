<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/vendor.php';

$database = new Database();
$db = $database->getConnection();
 
$vendor = new Vendor($db);

 
// get posted data
$data = json_decode(file_get_contents("php://input"));

if(   
    !empty($data->business_name)&&
    !empty($data->activation_date)&&
    !empty($data->contact_address)&&
    !empty($data->business_contact_no)&&
    !empty($data->category)&&
    !empty($data->merchant_status)&&
    !empty($data->contract_status)&&
    !empty($data->name_as_per_gst)&&
    !empty($data->GSTIN_number)&&
    !empty($data->registered_address)&&
    !empty($data->owner_name)&&
    !empty($data->owner_email)&&
    !empty($data->owner_phone)&&
    !empty($data->rate_card_detail)
    ){
        
    $vendor->business_name=$data->business_name;
    $vendor->activation_date=$data->activation_date;
    $vendor->contact_address=$data->contact_address;
    $vendor->business_contact_no=$data->business_contact_no;
    $vendor->category=$data->category;
    $vendor->merchant_status=$data->merchant_status;
    $vendor->contract_status=$data->contract_status;
    $vendor->name_as_per_gst=$data->name_as_per_gst;
    $vendor->GSTIN_number=$data->GSTIN_number;
    $vendor->registered_address=$data->registered_address;
    $vendor->owner_name=$data->owner_name;
    $vendor->owner_email=$data->owner_email;
    $vendor->owner_phone=$data->owner_phone;
    $vendor->created_date = date('Y-m-d H:i:s');
    $vendor->last_update_date = date('Y-m-d H:i:s');
    $vendor->rate_card_detail=$data->rate_card_detail;

    // create the product
    if($vendor->create()){
 
    // set response code - 201 created
    http_response_code(201);

    // tell the user
    echo json_encode(array("message" => "Vendor was created."));
}

// if unable to create the product, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    echo json_encode(array($vendor));
    // tell the user
    echo json_encode(array("message" => "Unable to create Vendor."));
}
    }
// tell the user data is incomplete
else{

// set response code - 400 bad request
http_response_code(400);

// tell the user
echo json_encode(array("message" => "Unable to create Vendor. Data is incomplete."));

}



?>