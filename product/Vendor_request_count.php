<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/Admin_dashboard.php';

$database = new Database();
$db = $database->getConnection();

$Vendor_Request = new Admin_Dashboard($db);

$stmt = $Vendor_Request->Vendor_Request_count();


if($stmt>0){
    $products_arr=array();
    $products_arr["Total Vendor_Request"]=array($stmt);
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