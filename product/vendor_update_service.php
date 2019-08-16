 <?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/vendor.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$vendor = new Vendor($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of product to be edited
$vendor->id = $data->id;
 
// set product property values

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
$vendor->created_date = $data->created_date;
$vendor->last_update_date = date('Y-m-d H:i:s');
$vendor->rate_card_detail=$data->rate_card_detail;

 
// update the product
if($vendor->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "Vendor Info was updated."));
}
 
// if unable to update the product, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update Vendor."));
}
?>