<?php
session_start();
unset($_SESSION["member_id"]);
unset($_SESSION["member_username"]);
unset($_SESSION["member_referal"]);
header("LOCATION: ../../login");
