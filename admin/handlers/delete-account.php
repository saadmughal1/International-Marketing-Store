<?php
include_once "../classes/db.php";
include_once "../classes/member.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $db = new Db();
    $member = new Member($db->getConnection(), $id);
    $member->deleteMember();
    header("LOCATION: ../manage-members");
}
