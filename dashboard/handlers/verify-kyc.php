<?php

include_once "../classes/db.php";
include_once "../classes/member.php";


if (isset($_POST["full_name"]) && isset($_POST["father_name"]) && isset($_POST["gender"]) && isset($_POST["cnic"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["country"])) {
    $full_name = $_POST["full_name"];
    $father_name = $_POST["father_name"];
    $gender = $_POST["gender"];
    $cnic = $_POST["cnic"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $country = $_POST["country"];

    session_start();
    $db = new Db();
    $member = new Member($db->getConnection(), $_SESSION["member_id"]);
    $res = $member->getMemberById()->fetch_assoc();
    $kyc_status = $res["kyc_status"];

    if ($kyc_status == 0) {
        if ($member->isKycAvailable($_SESSION["member_id"])->num_rows > 0) {
            $member->updateKYC($full_name, $father_name, $gender, $cnic, $address, $city, $country, $_SESSION["member_id"]);
            $member->updateKYCstatusTo0($_SESSION["member_id"]);
        } else {
            $member->insertKYC($full_name, $father_name, $gender, $cnic, $address, $city, $country, $_SESSION["member_id"]);
        }
    } else {
        $member->updateKYC($full_name, $father_name, $gender, $cnic, $address, $city, $country, $_SESSION["member_id"]);
        $member->updateKYCstatusTo0($_SESSION["member_id"]);
    }
    header("LOCATION: ../submit-kyc");
}
