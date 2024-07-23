<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Change Password</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- navbar -->
        <?php include_once "partials/_navbar.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            <?php include_once "partials/_sidebar.php"; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
 
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body overflow-auto p-5">
                                    <p class="text-center"><?php if (isset($_GET["msg"])) echo $_GET["msg"]; ?></p>

                                    <h4 class="card-title mb-5">Change Your Password</h4>
                                    <form class="customer-info-form" method="POST" action="handlers/change-password.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Enter Old Password:</label>
                                            <input type="text" name="old_pass" required class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Enter New Password:</label>
                                            <input type="text" name="new_pass" required class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <p class="text-danger"><?php if (isset($_GET["err"])) echo $_GET["err"]; ?></p>
                                        </div>

                                        <button class="btn float-end btn-success">Change</button>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

</body>

<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- End custom js for this page -->

</html>