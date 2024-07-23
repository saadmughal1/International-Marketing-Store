<?php

include_once "../classes/db.php";
include_once "../classes/member.php";


if (isset($_POST["old_pass"]) && isset($_POST["new_pass"])) {
    $old_pass = $_POST["old_pass"];
    $new_pass = $_POST["new_pass"];

    session_start();
    $db = new Db();
    $member = new Member($db->getConnection(), $_SESSION["member_id"]);

    $pass = $member->getMemberById()->fetch_assoc()["password"];
    if ($pass == $old_pass) {
        if($new_pass == $old_pass){
            header("LOCATION: ../change-password?err=Enter different password");
            exit();
        }
        else{
            $member->update_password($new_pass);
        }
    } else {
        header("LOCATION: ../change-password?err=Old password not matched");
        exit();
    }


    header("LOCATION: ../change-password?msg=Password Changed!");
}
