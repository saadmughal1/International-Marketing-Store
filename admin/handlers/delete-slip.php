<?php
include_once "../classes/db.php";
include_once "../classes/transaction_slip.php";


if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $db = new Db();
    $transaction_slip = new Transaction_slip($db->getConnection(), $id);

    $res = $transaction_slip->selectById()->fetch_assoc();

    $file_path = "../../assets/documents/" . $res["screenshot"];

    unlink($file_path);

    $transaction_slip->delete();
    header("LOCATION: ../deposit-slips");
}
