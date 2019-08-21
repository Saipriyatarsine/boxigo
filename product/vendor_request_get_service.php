<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/vendor_request.php';

$database = new Database();
$db = $database->getConnection();

$vendor_request = new Vendor_request($db);

$stmt = $vendor_request->read();
$num = $stmt->rowCount();

if($num>0){ 

    $products_arr=array();
    $products_arr["vendor_request"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "business_name" => $business_name,
            "business_contact_no" => $business_contact_no,
            "business_website_url" => $business_website_url,
            "verification_key" => $verification_key,
            "is_phone_verified" => $is_phone_verified,
            "legally_authorised" => $legally_authorised,
            "accept_terms_conditions" => $accept_terms_conditions,
            "created_date" => $created_date,
            "last_update_date" => $last_update_date

        );
        array_push($products_arr["vendor_request"], $product_item);
    }
     http_response_code(200);
     echo json_encode($products_arr);
}
 
else{
    http_response_code(404);
     echo json_encode(
        array("message" => "No services found.")
    );
}
?>