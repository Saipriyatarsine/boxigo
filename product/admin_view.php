<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/admin_view.php';

$database = new Database();
$db = $database->getConnection();

$Customer_count = new Admin_Dashboard($db);

$stmt = $Customer_count->Customer_count();


if(!empty($stmt)){
    $products_arr=array();
    $products_arr["adminView"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "Type" => $Type,
            "total" => $total
        );
        array_push($products_arr["adminView"], $product_item);
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