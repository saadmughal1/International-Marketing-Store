<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Referal Code</title>
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
                                    <h4 class="card-title mb-5">Copy Referral Code</h4>
                                    <div class="form-group">
                                        <label for="referralLink">Referral Code:</label>

                                        <input type="text" class="form-control" id="referralLink" value="<?php echo isset($_SESSION["member_referal"]) ? $_SESSION["member_referal"] : ''; ?>" readonly>
                                    </div>
                                    <button class="btn btn-primary" onclick="copyReferralLink()">Copy Code</button>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>

</body>

<script>
    function copyReferralLink() {
        var copyText = document.getElementById("referralLink");
        copyText.select();
        document.execCommand("copy");
        alert("Referral link copied to clipboard!");
    }
</script>

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