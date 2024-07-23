<?php

session_start();

if (isset($_SESSION["member_id"])) {
    header("LOCATION: dashboard");
}
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>
        Sign Up
    </title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <meta name="description" content="">

    <style>
        /* Styling for the iframe */
        .iframe-container {
            position: relative;
            width: 100%;
            height: 20vh;
            /* Adjust the height as needed */
            margin-top: 0px;
            /* Space for the timer */
        }

        .iframe-container iframe {
            width: 5%;
            height: 5%;
            border: none;
        }
    </style>

    <link href="floatpanels/float-panel.css" rel="stylesheet">
    <script src="floatpanels/float-panel.js"></script>

    <link rel="icon" type="image/png" href="assets/images/favicon.png">
</head>

<body>
    <form method="post" action="handlers/signup.php" id="form1">

        <div id="UpdatePanel1">


            <div class="wrapper-page" style="margin-top: 20px;">

                <div class="card overflow-hidden account-card mx-3 shadow">
                    <div class="bg-primary p-4 text-white text-center position-relative">
                        <h4 class="font-20 m-b-5">Welcome to IMS !</h4>
                        <p class="text-white-50 mb-4">Signup to continue...</p>
                        <a href="#" class="logo logo-admin">
                            <img src="assets/images/favicon.png" height="65" alt="" style="border-radius: 100%;">
                        </a>
                    </div>

                    <div class="account-card-content">

                        <div id="AlertWindow" class="p-1"></div>

                        <div id="UpdateProgress1" style="display:none;">

                            <div>
                                <div class="spinner-border text-dark" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                Please Wait ...
                            </div>

                        </div>

                        <div id="RegisterDetailPanel">


                            <div class="form-group">
                                <label>
                                    <span id="ReferralLabel">Please enter Referral</span>
                                    &nbsp;</label>
                                <input name="referral" type="text" autocomplete="off" id="ReferralTextBox" class="form-control">
                            </div>

                            <div id="FindReferralPanel" class="form-group mb-0">
                            </div>

                            <div class="form-group">
                                <label>
                                    Enter Email
                                    &nbsp;
                                </label>
                                <input name="email" type="email" autocomplete="off" id="EmailTextBox" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="EmptyLineHiddenField" id="EmptyLineHiddenField">
                                <input type="hidden" name="ReferralIDHiddenField" id="ReferralIDHiddenField">
                                <input type="hidden" name="VoucherIDHiddenField" id="VoucherIDHiddenField">
                                <input type="hidden" name="VoucherMobileDHiddenField" id="VoucherMobileDHiddenField">
                                <input type="hidden" name="PlanIDHiddenField" id="PlanIDHiddenField">
                                <input type="hidden" name="PlacementField" id="PlacementField">
                                <label>
                                    Enter Username
                                    &nbsp;</label>
                                <input name="username" type="text" id="NewUserNameTextBox" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>
                                    Enter Password
                                    &nbsp;</label>
                                <input name="password" type="password" autocomplete="off" id="NewPasswordTextBox" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="CreateNewAccountButton" value="Create Account" id="CreateNewAccountButton" class="aspNetDisabled btn btn-primary waves-effect waves-light mr-1">
                                <input id="Reset1" type="reset" value="Reset" class="btn btn-primary waves-effect waves-light mr-1">
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-10">
                                    <a href="login"><i class="mdi mdi-account"></i>Login</a>
                                </div>
                            </div>

                            <h6 class="text-danger text-center">
                                <?php if (isset($_GET["err"]))
                                    echo $_GET["err"]; ?>
                            </h6>

                            <div class="m-t-10"></div>

                        </div>


                    </div>

                </div>

                <div class="m-t-30 text-center">
                    <p>Copyright © International Marketing Store 2024, All Rights Reserved.</p>
                </div>

            </div>

        </div>

    </form>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.min.js"></script>
    <script src="assets/js/app.js"></script>

</body>

</html>