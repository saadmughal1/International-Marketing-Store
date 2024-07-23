<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KYC Form</title>
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
                                    <h4 class="card-title mb-5">KYC Form</h4>
                                    <form class="customer-info-form" method="POST" action="handlers/verify-kyc.php">

                                        <div class="form-group">
                                            <label for="">Full Name:</label>
                                            <input type="text" name="full_name" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Father Name:</label>
                                            <input type="text" name="father_name" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Gender:</label>
                                            <select name="gender" class="form-control p-4 text-dark" required>
                                                <option value="" selected disabled>Select Your Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">CNIC Number:</label>
                                            <input type="text" name="cnic" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Current Address:</label>
                                            <textarea name="address" cols="30" rows="4" required class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="">City:</label>
                                            <input type="text" name="city" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Country:</label>
                                            <input type="text" name="country" required class="form-control">
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
                                        <button class="btn float-end btn-success">Submit KYC</button>
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