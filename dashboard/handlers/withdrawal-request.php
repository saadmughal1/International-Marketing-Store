<?php

include_once "../classes/db.php";
include_once "../classes/withdrawal.php";
include_once "../classes/member.php";

if (isset($_POST["amount"]) && isset($_POST["accno"]) && isset($_POST["comment"]) && isset($_POST["method"])) {
    $amount = $_POST["amount"];
    $accno = $_POST["accno"];
    $comment = $_POST["comment"];
    $method = $_POST["method"];

    session_start();
    $db = new Db();
    $member = new Member($db->getConnection(), null, null, null, null, null, null, $_SESSION["member_referal"]);

    $res = $member->getMemberByReferral()->fetch_assoc();
    if (($res["directIncome"] + $res["rewardIncome"] + $res["indirectIncome"]) >= $amount) {
        $db = new Db();
        session_start();
        $withdrawal = new Withdrawal($db->getConnection(), null, $amount, $accno, $comment,$_SESSION["member_referal"]);

        $withdrawal->insertWithdrawal($method);

        header("LOCATION: ../");
    } else {
        header("LOCATION: ../withdrawal-request?err=Insufficient Withdrawal Ammount.");
    }
}
