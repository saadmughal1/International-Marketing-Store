<?php
include_once "../classes/db.php";
include_once "../classes/withdrawal.php";
include_once "../classes/member.php";


if (isset($_GET["id"]) && isset($_GET["ref"]) && isset($_GET["amount"])) {
    $id = $_GET["id"];
    $ref = $_GET["ref"];
    $amount = $_GET["amount"];

    $db = new Db();
    $withdrawal = new Withdrawal($db->getConnection(), $id);
    $member = new Member($db->getConnection());
    $mres = $member->getMemberByReferral($ref)->fetch_assoc();

    $withdrawalAmount = $_GET["amount"];

    $currentDirectIncome = $mres["directIncome"];
    $currentIndirectIncome = $mres["indirectIncome"];
    $currentReward = $mres["rewardIncome"];

    if ($currentDirectIncome >= $withdrawalAmount) {
        $currentDirectIncome -= $withdrawalAmount;
    } elseif ($currentDirectIncome + $currentIndirectIncome >= $withdrawalAmount) {
        $remainingWithdrawal = $withdrawalAmount - $currentDirectIncome;
        $currentDirectIncome = 0;
        $currentIndirectIncome -= $remainingWithdrawal;
    } elseif ($currentDirectIncome + $currentIndirectIncome + $currentReward >= $withdrawalAmount) {
        $remainingWithdrawal = $withdrawalAmount - ($currentDirectIncome + $currentIndirectIncome);
        $currentDirectIncome = 0;
        $currentIndirectIncome = 0;
        $currentReward -= $remainingWithdrawal;
    } else {
        // insufficient balance
    }

    $member->updateBalance($currentDirectIncome, $currentIndirectIncome, $currentReward, $mres["id"]);

    $withdrawal->deleteWithdrawal();

    header("LOCATION: ../");
}
