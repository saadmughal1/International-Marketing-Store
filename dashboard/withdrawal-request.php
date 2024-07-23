<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Withdrawal Request</title>
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
                                    <h4 class="card-title mb-5">Withdrawal Request</h4>
                                    <form class="customer-info-form" method="POST" action="handlers/withdrawal-request.php">

                                        <div class="form-group">
                                            <label for="">Payment Gateway:</label>
                                            <select name="method" class="form-control p-4 text-dark" required>
                                                <option value="" selected disabled>Select Payment Gateway</option>
                                                <option value="Easy Paisa"> Easy Paisa</option>
                                                <option value="Jazz Cash">Jazz Cash</option>
                                                <option value="U-Paisa">U-Paisa</option>
                                                <option value="The Bank of Punjab">The Bank of Punjab</option>
                                                <option value="Faisal Bank">Faisal Bank</option>
                                                <option value="Meezan Bank">Meezan Bank</option>
                                                <option value="Soneri Bank">Soneri Bank</option>
                                                <option value="Habib Bank Limited (HBL)">Habib Bank Limited (HBL)</option>
                                                <option value="Bank Alfalah">Bank Alfalah</option>
                                                <option value="Bank of Khyber">Bank of Khyber</option>
                                                <option value="United Bank Limited (UBL)">United Bank Limited (UBL)</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Withdrawal Amount:</label>
                                            <input type="number" name="amount" required class="form-control" required>
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
                                            <p class="text-danger"><?php if (isset($_GET["err"])) echo $_GET["err"]; ?></p>
                                        </div>

                                        <?php
                                        include_once "classes/db.php";
                                        include_once "classes/member.php";
                                        $db = new Db();
                                        $member = new Member($db->getConnection(), $_SESSION["member_id"]);
                                        $res = $member->getMemberById()->fetch_assoc();
                                        $kyc_status = $res["kyc_status"];

                                        ?>
                                        <div>
                                            <h6><?php echo ($kyc_status == 0) ? "KYC status Pending" : "KYC status Approved"; ?></h6>
                                        </div>
                                        <button <?php if ($kyc_status == 0) echo "disabled"; ?> class="btn float-end btn-success">Submit</button>
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