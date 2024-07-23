<?php

include_once "../classes/db.php";
include_once "../classes/member.php";


if (isset($_POST["package"])) {
    $package = $_POST["package"];

    session_start();
    $db = new Db();
    $member = new Member($db->getConnection());
    $member->updatePackage($package, $_SESSION["member_id"]);
    header("LOCATION: ../send-deposit-proof");
}
