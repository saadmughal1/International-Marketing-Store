<?php

include_once __DIR__ . "/../classes/db.php";
include_once __DIR__ . "/../classes/member.php";

if (isset($_POST["username"]) && isset($_POST["password"]) &&  isset($_POST["referral"]) && isset($_POST["email"])) {
    $referral = $_POST["referral"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];



    if (empty($_POST["email"]) || empty($_POST["username"]) || empty($_POST["password"])) {
        header("LOCATION: ../signup?err=All fields are required");
        die();
    }

    $myReferral = strtoupper(bin2hex(random_bytes(4)));

    $db = new Db();
    $member = new Member($db->getConnection(), null, $username, $password, $email, $referral, 0, $myReferral);

    if (!empty($referral)) {
        if ($member->isValidReferral()->num_rows > 0) {
            $member->signup();
            header("LOCATION: ../login");
        } else {
            header("LOCATION: ../signup?err=Invalid Referral Code");
        }
    } else {
        $member->signup();
        header("LOCATION: ../login");
    }
}
