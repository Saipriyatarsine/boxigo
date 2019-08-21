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

if( 
    !empty($data->name)&&
    !empty($data->email)&&
    !empty($data->phone)&&
    !empty($data->business_name)&&
    !empty($data->business_contact_no)&&
    !empty($data->business_website_url)&&
    !empty($data->verification_key)&&
    !empty($data->is_phone_verified)&&
    !empty($data->legally_authorised)&&
    !empty($data->accept_terms_conditions)
    ){
        
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
    
    // create the vendor_request
    if($vendor_request->create()){
 
    // set response code - 201 created
    http_response_code(201);

    // tell the user
    echo json_encode(array("message" => "vendor_request was created."));
}

// if unable to create the vendor_request, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);
    echo json_encode(array("vendor_request" => $vendor_request));

    // tell the user
    echo json_encode(array("message" => "Unable to create vendor_request."));
}
    }
// tell the user data is incomplete
else{

// set response code - 400 bad request
http_response_code(400);

// tell the user
echo json_encode(array("message" => "Unable to create vendor_request. Data is incomplete."));

}
?>