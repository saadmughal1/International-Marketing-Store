<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Withdrawl Request</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                  <h4 class="card-title mb-5">Withdrawal Requests</h4>
                  <table class="table table-bordered">
                    <thead>
                      <tr class="text-center">
                        <th> # </th>
                        <th> Referral </th>
                        <th> Username </th>
                        <th> Amount</th>
                        <th> Account No</th>
                        <th> Comment</th>
                        <th> Gateway</th>
                        <th> </th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php
                      include_once "classes/db.php";
                      include_once "classes/withdrawal.php";
                      include_once "classes/member.php";
                      $db = new Db();
                      $withdrawal = new Withdrawal($db->getConnection());
                      $res = $withdrawal->getWithdrawal();

                      $member = new Member($db->getConnection());


                      $index = 0;
                      while ($row = $res->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . ++$index . "</td>";
                        echo "<td>" . $row["referral"] . "</td>";
                        echo "<td>" . $member->getMemberByReferral($row["referral"])->fetch_assoc()["username"] . "</td>";
                        echo "<td>" . $row["amount"] . "</td>";
                        echo "<td>" . $row["accno"] . "</td>";
                        echo "<td>" . $row["comment"] . "</td>";
                        echo "<td>" . $row["method"] . "</td>";
                        echo "<td><a onclick=\"return confirm('Are you sure you want to withdraw this amount?')\" href='handlers/withdrawal.php?id=" . $row["id"] . "&ref=" . $row["referral"] . "&amount=" . $row["amount"] . "'>Withdraw</a></td>";
                        echo "</tr>";
                      }
                      ?>
                    </tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
</body>

</html>