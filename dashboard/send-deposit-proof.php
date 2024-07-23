<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Deposit Slip</title>
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
                        <div class="col-md-12">

                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body overflow-auto p-5">
                                        <p><span class="text-danger"><b>IMPORTANT NOTE</b></span> Note! for more timely product delivery pleasy send Rs.<span class="text-danger"><b><?php echo DELIVERY_CHARGES;?></b></span> delivery charges separately on </p>
                                        <h5>Easypaisa / Jazz Cash</h5>
                                        <h5><?php echo "Account Number: " . CONTACT_NUMBER; ?></h5>
                                        <h5><?php echo "Account Title: " . NAME; ?></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 ">
                                <form class="customer-info-form" method="POST" action="handlers/send-transaction-slip.php" enctype="multipart/form-data">


                                    <div class="form-group">
                                        <label for="">Transferred Amount:</label>
                                        <input type="number" name="amount" required class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Transaction ID:</label>
                                        <input type="text" name="tid" required class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Account No/Mobile Account:</label>
                                        <input type="text" name="accno" required class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Comments:</label>
                                        <input type="text" name="comment" required class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Screenshot:</label>
                                        <input type="file" name="screenshot" required class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <p class="text-danger"><?php if (isset($_GET["err"])) echo $_GET["err"]; ?></p>
                                    </div>


                                    <button class="btn float-end btn-success">Submit</button>
                                </form>
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