<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purchase History</title>
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
                  <h4 class="card-title mb-5">Purchase History</h4>
                  <form method="GET" action="">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="start_date">Start Date:</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="end_date">End Date:</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                  </form>

                  <table class="table table-bordered">
                    <thead>
                      <tr class="text-center">
                        <th> # </th>
                        <th> Referral </th>
                        <th> Username </th>
                        <th> Product Details</th>
                        <th> Package </th>
                        <th> Date </th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php
                      include_once "classes/db.php";
                      include_once "classes/order.php";
                      include_once "classes/member.php";
                      $db = new Db();
                      $order = new Order($db->getConnection());

                      if (isset($_GET["start_date"]) && isset($_GET["end_date"])) {
                        $res = $order->getConfirmedOrdersWithDate($_GET["start_date"], $_GET["end_date"]);
                      } else {
                        $res = $order->getConfirmedOrders();
                      }


                      $member = new Member($db->getConnection());

                      $index = 0;
                      while ($row = $res->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . ++$index . "</td>";
                        echo "<td>" . $row["referral"] . "</td>";
                        echo "<td>" . $member->getMemberByReferral($row["referral"])->fetch_assoc()["username"] . "</td>";
                        echo "<td>";
                        $productData = json_decode($row["product_data"], true);

                        if ($productData !== null) {
                          echo "<table class='table table-bordered'>";
                          echo "<thead><tr><th>Product Name</th><th>Quantity</th></tr></thead>";
                          echo "<tbody>";

                          foreach ($productData as $product) {
                            echo "<tr>";
                            echo "<td>" . $product["productName"] . "</td>";
                            echo "<td>" . $product["quantity"] . "</td>";
                            echo "</tr>";
                          }

                          echo "</tbody></table>";
                        } else {
                          echo "Invalid JSON data";
                        }
                        echo "</td>";
                        echo "<td>" . $row["package"] . "</td>";
                        echo "<td>" . $row["date"] . "</td>";

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

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
</body>

</html>