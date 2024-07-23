<?php include_once "../config.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Package</title>
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
                                    <h4 class="card-title mb-5">Select Package</h4>
                                    <form action="product-order" method="GET">
                                        <div class="form-group w-100">
                                            <select name="package" class="form-control" Required>
                                                <option value="" selected disabled>Choose Package</option>
                                                <option value="1000">1000</option>
                                                <option value="3000">3000</option>
                                                <option value="6000">6000</option>
                                                <option value="10000">10000</option>
                                                <option value="16000">16000</option>
                                                <option value="20000">20000</option>
                                            </select>
                                        </div>
                                        <button class="btn float-end btn-success">Update</button>
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