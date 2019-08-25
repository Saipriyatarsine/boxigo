<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/rate_card_details.php';

$database = new Database();
$db = $database->getConnection();

$rate_card_details = new Rate_Card_Details($db);

$stmt = $rate_card_details->read();
$num = $stmt->rowCount();


if($num>0){ 

    $products_arr=array();
    $products_arr["rate_card_details"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "id" => $id,
            "vendor_id" => $vendor_id,
            "valid_from" => $valid_from,
            "valid_to" => $valid_to,
            "type" => $type,
            "detail" => $detail,
            "created_date" => $created_date,
            "last_update_date" => $last_update_date
        );
        array_push($products_arr["rate_card_details"], $product_item);
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