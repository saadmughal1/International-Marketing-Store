<?php
include_once "../classes/db.php";
include_once "../classes/order.php";
include_once "../classes/member.php";



if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $post_data = file_get_contents("php://input");

    $selected_products = json_decode($post_data, true);

    if ($selected_products !== null) {

        $db = new Db();
        $order = new Order($db->getConnection());
        $member = new Member($db->getConnection());

        session_start();
        $mid = $_SESSION["member_id"];
        $status = 0;

        $selected_products_json = json_encode($selected_products["selectedProducts"]);
        $date = date('Y-m-d');
        $order->orderProducts($selected_products_json, $date, $status, $mid,$selected_products["package"],$_SESSION["member_referal"]);
        
    } else {
        http_response_code(400);
        echo "Error: Failed to decode JSON data.";
    }
} else {
    http_response_code(405);
    echo "Error: Only POST requests are allowed.";
}
