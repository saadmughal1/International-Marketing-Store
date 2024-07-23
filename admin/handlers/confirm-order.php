<?php
include_once "../classes/db.php";
include_once "../classes/order.php";
include_once "../classes/member.php";


if (isset($_GET["id"]) && isset($_GET["referral"]) && isset($_GET["ammount"])) {
    $id = $_GET["id"];
    $referral = $_GET["referral"];
    $ammount = $_GET["ammount"];

    $db = new Db();

    $order = new Order($db->getConnection(), $id);
    $member = new Member($db->getConnection());

    $points = $member->myPoints($ammount);
    if ($points > 0) {
        $member->updateMyPoints($points, $referral);
        $member->updateMyRewardBit($referral);
    }

    $member->updatePackage($ammount, $referral);
    $order->addpackage_info($ammount, $referral);

    $directIncome = $member->directIncome($ammount);
    $inDirectIncome = $member->inDirectIncome($ammount);

    $directReferral = $member->getMemberByReferral($referral)->fetch_assoc()["referral"];

    $currentDate = date('Y-m-d');

    if (!empty($directReferral)) {
        $member->updateDirectIncome($directIncome, $directReferral);
        $member->updateMyPoints($points, $directReferral);
        // directIncome
        $directReffUname = $member->getMemberByReferral($directReferral)->fetch_assoc()["username"];
        $order->addTransactionInfo($referral, "Direct Referral", $currentDate, $directIncome, $directReffUname);

        $temp = $directReferral;

        // indirectIncome
        for ($i = 0; $i < 8; $i++) {

            $inDirectReferral = $member->getMemberByReferral($temp)->fetch_assoc();

            if(!empty($inDirectReferral)){
                $nextperson = $member->getMemberByReferral($inDirectReferral["referral"])->fetch_assoc();
                if (!empty($nextperson) && $nextperson["status"] == 1 && $nextperson["points"] >= 350) {
                    
                    $member->updateInDirectIncome($inDirectIncome, $inDirectReferral["referral"]);
                    $order->addTransactionInfo($referral, "Indirect Referral", $currentDate, $inDirectIncome, $inDirectReferral["username"]);
                }
                $member->updateMyPoints($points, $inDirectReferral["referral"]);
                $temp = $inDirectReferral["referral"];
            }
        }
    }
    $order->confirmOrder();
    header("LOCATION: ../pending-orders");
}
