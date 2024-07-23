<?php
include_once "../classes/db.php";
include_once "../classes/order.php";


if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $db = new Db();
    $order = new Order($db->getConnection(), $id);

    $order->deleteOrder();
    header("LOCATION: ../");
}
