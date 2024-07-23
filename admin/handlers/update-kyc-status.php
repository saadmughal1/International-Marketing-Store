<?php
include_once "../classes/db.php";
include_once "../classes/member.php";


if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $db = new Db();
    $member = new Member($db->getConnection());
    $member->updateKYCstatus($id);
    header("LOCATION: ../kyc");
}
