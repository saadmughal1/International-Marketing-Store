<?php
include_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<style>
  .my-card {
    background-color: red;
    padding: 10px 20px;
    border-top-left-radius: 2rem;
    border-bottom-right-radius: 2rem;
    color: white;
    width: 150px;
  }

  .my-card h6,
  .my-card span {
    font-size: 0.8rem;
  }

  .db-color-blue {
    background-image: radial-gradient(circle 976px at 51.2% 51%, rgba(11, 27, 103, 1) 0%, rgba(16, 66, 157, 1) 0%, rgba(11, 27, 103, 1) 17.3%, rgba(11, 27, 103, 1) 58.8%, rgba(11, 27, 103, 1) 71.4%, rgba(16, 66, 157, 1) 100.2%, rgba(187, 187, 187, 1) 100.2%);
  }
</style>

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

                <?php include_once "partials/_welcome-nav.php"; ?>

                <div class="card-body overflow-auto p-5">

                  <?php
                  include_once "classes/db.php";
                  include_once "classes/member.php";

                  $db = new Db();
                  $member = new Member($db->getConnection(), $_SESSION["member_id"]);

                  $status = $member->accountStatus()->fetch_assoc()["status"];
                  $points = $member->myPoints()->fetch_assoc()["points"];
                  $myReferral = $member->myReferral()->fetch_assoc()["referral"];
                  $currentPackage = $member->currentPackage()->fetch_assoc()["currentPackage"];
                  $myDirectIncome = $member->myDirectIncome()->fetch_assoc()["directIncome"];
                  $myIndirectIncome = $member->myIndirectIncome()->fetch_assoc()["indirectIncome"];
                  $myRewardIncome = $member->myRewardIncome()->fetch_assoc()["rewardIncome"];



                  if (!empty($myReferral)) {
                    // $referralUsername = $member->usernameWithReferral($myReferral)->fetch_assoc()["username"];

                    $res = $member->usernameWithReferral($myReferral);
                    $referralUsername  = "";
                    if ($res->num_rows > 0) {
                      $referralUsername = $res->fetch_assoc()["username"];
                    }
                  } else {
                    $referralUsername = "";
                  }


                  ?>

                  <marquee behavior="scroll" direction="left" scrollamount="6" onmouseover="this.stop()" onmouseout="this.start()">

                    <?php
                    if ($status == 1) {
                      echo '<span class="text-success">Congratulations (' . $_SESSION["member_username"] . ') Your Account has been Activated	</span>';
                    } else {
                      echo '<span class="text-danger">Dear (' . $_SESSION["member_username"] . ') Sorry Your Account Is In-Active Please Purchase Any Package to activate your account.</span>';
                    }
                    ?>

                  </marquee>


                  <div class="row mt-5">

                    <div class="col-lg-3 grid-margin stretch-card">
                      <div class="my-card db-color-blue w-100 p-4">
                        <h6>Account Status</h6>
                        <span>
                          <?php echo ($status == 1) ? "Activate" : "Deativate"; ?>
                          <?php echo "<br>"; ?>
                          <?php echo ($status == 1) ? "Package: " . $currentPackage : "" ?>
                        </span>
                      </div>
                    </div>

                    <div class="col-lg-3 grid-margin stretch-card">
                      <div class="my-card db-color-blue w-100 p-4">
                        <h6>Rank</h6>
                        <span><?php echo $member->myRank($points) ?></span>
                      </div>
                    </div>

                    <div class="col-lg-3 grid-margin stretch-card">
                      <div class="my-card db-color-blue w-100 p-4">
                        <h6>Current Direct Income</h6>
                        <span>Rs. <?php echo $myDirectIncome; ?></span>
                      </div>
                    </div>

                    <div class="col-lg-3 grid-margin stretch-card">
                      <div class="my-card db-color-blue w-100 p-4">
                        <h6>Current Indirect Income</h6>
                        <span>Rs. <?php echo $myIndirectIncome; ?></span>
                      </div>
                    </div>

                    <div class="col-lg-3 grid-margin stretch-card">
                      <div class="my-card db-color-blue w-100 p-4">
                        <h6>Current Reward Income</h6>
                        <span>Rs. <?php echo $myRewardIncome; ?></span>
                      </div>
                    </div>

                    <div class="col-lg-3 grid-margin stretch-card">
                      <div class="my-card db-color-blue w-100 p-4">
                        <h6>My Referral</h6>
                        <span><?php echo $referralUsername; ?></span>
                      </div>
                    </div>

                    <div class="col-lg-3 grid-margin stretch-card">
                      <div class="my-card db-color-blue w-100 p-4">
                        <h6>Total Points</h6>
                        <span><?php echo $points; ?></span>
                      </div>
                    </div>

                    <div class="col-lg-3 grid-margin stretch-card">
                      <div class="my-card db-color-blue w-100 p-4">
                        <h6>Grand Total</h6>
                        <span>Rs. <?php echo $myRewardIncome + $myIndirectIncome + $myDirectIncome; ?></span>
                      </div>
                    </div>

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