<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/customer.php';

$database = new Database();
$db = $database->getConnection();

$customer = new Customers($db);

$stmt = $customer->read();
$num = $stmt->rowCount();

if($num>0){ 

    $products_arr=array();
    $products_arr["customers"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "user_id" => $user_id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email,
            "phone" => $phone,
            "verification_key" => $verification_key,
            "is_email_verified" => $is_email_verified,
            "is_phone_verified" => $is_phone_verified,
            "date_created" => $date_created

        );
        array_push($products_arr["customers"], $product_item);
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