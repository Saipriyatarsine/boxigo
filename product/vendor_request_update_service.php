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
    
// set product property values
    $vendor_request->name = $data->name;
    $vendor_request->email = $data->email;
    $vendor_request->phone = $data->phone;
    $vendor_request->business_name = $data->business_name;
    $vendor_request->business_contact_no = $data->business_contact_no;
    $vendor_request->business_website_url = $data->business_website_url;
    $vendor_request->verification_key = $data->verification_key;
    $vendor_request->is_phone_verified = $data->is_phone_verified;
    $vendor_request->legally_authorised= $data->legally_authorised;
    $vendor_request->accept_terms_conditions = $data->accept_terms_conditions;
    $vendor_request->created_date = date('Y-m-d H:i:s');
    $vendor_request->last_update_date = date('Y-m-d-H:i:s');

// update the product
if($vendor_request->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "vendor_request was updated."));
}
 
// if unable to update the product, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update vendor_request."));
}


?>