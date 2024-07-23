<?php 

session_start();

if(isset($_SESSION["admin_id"])){
    header("LOCATION: ./");
}
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>
        Login
    </title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="floatpanels/float-panel.css" rel="stylesheet">
    <script src="floatpanels/float-panel.js"></script>
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">

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

</head>

<body>
    <form method="post" action="handlers/login.php" id="form1">
        <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="60BWadJ+zwh+CEoyeOcJaeVO3506/1RWdqyjE79Qb0QwknyBzQZeOly9EstQLfKTuVgwdU08/BELxYBtbjuVDkmiTkjfYJj1UN9nBACg+tXDYmE+N4PvvWWWqY5ZpqMEhPRqUJp/2fBnbqFQ+jCsPc5wtajZWWjWGF4veFkTk0W+fE5FFeDWT74aOXcKhDNtKd8txB11V0Hq+Zx9DCAQCf/ct2RtdKPjGg8p7y3kOov+2Zj6">

        <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="D5436915">
        <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="+9yNYAc0ceDBpvjIIAN1ZOSCq0yngLbJftJUvhc0XACeBArJtyUoAEMfRPNenqBQhxp9xwBwmuCYye+55GivGD8Xh1SVB3T5/StXZt1p1B39Po73AuEHJ5FWE6uYabA1oJikJOu5xkIz5PNlJbnSwkJW/Z5MvWctRzyOTPzmpu/cinjP27MzFnVFETbljbYEbr6L9Q==">

        <div class="wrapper-page">

            <div class="card overflow-hidden account-card mx-3 shadow rounded-corner">

                <div class="bg-primary p-4 text-white text-center position-relative">
                    <h4 class="font-20 m-b-5">Welcome to IMS !</h4>
                    <p class="text-white-50 mb-4">Sign in to continue...</p>
                    <a href="#" class="logo logo-admin">
                        <img src="../assets/images/favicon.png" height="65" alt="" style="border-radius: 100%;">
                    </a>
                </div>
                <div class="account-card-content">
                    <div id="AlertWindow" class="p-1"></div>
                    <div class="form-group slideanim">
                        <label for="username">Username</label>&nbsp;
                        <input name="username" type="text" id="UserNameTextBox" class="form-control">
                    </div>
                    <div class="form-group slideanim">
                        <label for="userpassword">Password</label>&nbsp;
                        <input name="password" type="password" id="PasswordTextBox" class="form-control">
                    </div>
                    <div class="form-group row m-t-20 slideanim d-flex justify-content-end">
                        <div class="col-sm-6 text-right slideanim">
                            <input type="submit" name="LoginButton" value="  Login  " id="LoginButton" class="btn btn-primary w-md waves-effect waves-light">
                        </div>
                    </div>
                    <h6 class="text-danger text-center">
                        <?php if (isset($_GET["err"]))
                            echo $_GET["err"]; ?>
                    </h6>
                    <br>
                </div>
            </div>
            <div class="m-t-40 text-center slideanim">
                <p>
                    Copyright © International Marketing Store 2024, All Rights Reserved.
                </p>
            </div>


        </div>
    </form>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.js"></script>
    <script src="../assets/js/waves.min.js"></script>
    <script src="../assets/js/app.js"></script>

    <div id="IframePanel" class="row">
        <div class="col-lg-12">
            <div class="iframe-container">
                <iframe src="https://www.freetoolsnetwork.com/" id="AdIframe" title=""></iframe>
            </div>
        </div>
    </div>

</body>

</html>