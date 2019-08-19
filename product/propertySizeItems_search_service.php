<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/propertySizeItems.php';
 
$database = new Database();
$db = $database->getConnection();
 
$propertySizeItems = new PropertySizeItems($db);

// get keywords
$keywords=isset($_GET["property-size"]) ? $_GET["property-size"] : "";
 
$stmt = $propertySizeItems->search($keywords);
$num = $stmt->rowCount();
 
if($num>0){ 

    $products_arr=array();
    $products_arr["propertySizeItems"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
            "id" => $id,
            "move_size" => $move_size,
            "item_id" => $item_id,
            "quantity" => $quantity,
            "created_date" => $created_date,
            "last_update_date" => $last_update_date
        );
        array_push($products_arr["propertySizeItems"], $product_item);
    }
     http_response_code(200);
     echo json_encode($products_arr);
}
 
else{
    http_response_code(404);
     echo json_encode(
        array("message" => "No property Size Items found.")
    );
}
?>