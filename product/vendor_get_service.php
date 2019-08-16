<?php 

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/vendor.php';

$database = new Database();
$db = $database->getConnection();
 
$vendor = new Vendor($db);
 
$stmt = $vendor->read();
$num = $stmt->rowCount();
if($num>0){ 

    $products_arr=array();
    $products_arr["vendor"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "id" => $id,
            "business_name" => $business_name,
            "activation_date" => $activation_date,
            "contact_address" => $contact_address,
            "business_contact_no" => $business_contact_no,
            "category" => $category,
            "merchant_status" => $merchant_status,
            "contract_status" => $contract_status,
            "name_as_per_gst" => $name_as_per_gst,
            "GSTIN_number" => $GSTIN_number,
            "registered_address" => $registered_address,
            "owner_name" => $owner_name,
            "owner_email" => $owner_email,
            "owner_phone" => $owner_phone,
            "created_date" => $created_date,
            "last_update_date" => $last_update_date,
            "rate_card_detail" => $rate_card_detail
        );
        array_push($products_arr["vendor"], $product_item);
    }
     http_response_code(200);
     echo json_encode($products_arr);
}
 
else{
    http_response_code(404);
     echo json_encode(
        array("message" => "No vendor found.")
    );
}
?>