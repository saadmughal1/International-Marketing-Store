<?php

include_once "../classes/db.php";
include_once "../classes/transaction_slip.php";

if (isset($_POST["amount"]) && isset($_POST["tid"]) && isset($_POST["accno"]) && isset($_POST["comment"]) && isset($_FILES["screenshot"])) {
    $amount = $_POST["amount"];
    $tid = $_POST["tid"];
    $accno = $_POST["accno"];
    $comment = $_POST["comment"];

    $uploadDir = "../../assets/documents/";
    $allowedExtensions = ["jpg", "jpeg", "png"];

    $screenshot = $_FILES["screenshot"];

    $fileInfo = pathinfo($screenshot["name"]);
    $extension = strtolower($fileInfo["extension"]);

    $uniqueFilename = "";

    if (in_array($extension, $allowedExtensions) && getimagesize($screenshot["tmp_name"])) {
        $uniqueFilename = uniqid("screenshot_") . "." . $extension;
        $destination = $uploadDir . $uniqueFilename;
        move_uploaded_file($screenshot["tmp_name"], $destination);
    } else {
        header("LOCATION: ../send-deposit-proof?err=Only jpg jpeg and png are allowed.");
        exit();
    }

    $db = new Db();
    session_start();
    $transaction_slip = new Transaction_slip($db->getConnection(), null, $amount, $tid, $accno, $comment, $uniqueFilename, $_SESSION["member_referal"]);

    $transaction_slip->insertTransactionSlip();

    header("LOCATION: ../");
}
