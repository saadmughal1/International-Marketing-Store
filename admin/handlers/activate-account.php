<?php

include_once __DIR__ . "/../classes/db.php";
include_once __DIR__ . "/../classes/member.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $db = new Db();

    $member = new Member($db->getConnection(),$id);
    $res = $member->activateAccount();

    header("LOCATION: ../");
}
