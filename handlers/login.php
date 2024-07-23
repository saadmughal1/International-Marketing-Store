<?php

include_once __DIR__ . "/../classes/db.php";
include_once __DIR__ . "/../classes/member.php";

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($_POST["username"]) || empty($_POST["password"])) {
        header("LOCATION: ../login?err=All fields are required");
        die();
    }

    $db = new Db();

    $username = mysqli_real_escape_string($db->getConnection(), $username);
    $password = mysqli_real_escape_string($db->getConnection(), $password);

    $member = new Member($db->getConnection(), null, $username, $password);

    $res = $member->login();

    if ($res->num_rows > 0) {
        session_start();
        $res = $res->fetch_assoc();

        if ($member->myRewardBit($res["id"])->fetch_assoc()["isReward"] == 1) {
            $income = $member->myReward($res["points"]);
            $member->updateMyReward($income, $res["id"]);
            $member->updateMyRewardBit($res["id"]);
        }


        $_SESSION["member_id"] = $res["id"];
        $_SESSION["member_username"] = $_POST["username"];
        $_SESSION["member_referal"] = $res["my_referral"];

        header("LOCATION: ../dashboard");
    } else {
        header("LOCATION: ../login?err=Invalid Username or Password.");
        die();
    }
}
