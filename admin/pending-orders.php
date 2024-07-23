<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pending Orders</title>
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
                  <h4 class="card-title mb-5">Pending Orders</h4>
                  <table class="table table-bordered">
                    <thead>
                      <tr class="text-center">
                        <th> # </th>
                        <th> Referral </th>
                        <th> Username </th>
                        <th> Product Details</th>
                        <th> Package </th>
                        <th> Order Date </th>
                        <th> </th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php
                      include_once "classes/db.php";
                      include_once "classes/order.php";
                      include_once "classes/member.php";
                      $db = new Db();
                      $order = new Order($db->getConnection());
                      $res = $order->getOrders();

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
                          echo "<tr>";

                          echo "</tr>";

                          echo "</tbody></table>";
                        } else {
                          echo "Invalid JSON data";
                        }
                        echo "</td>";
                        echo "<td>" . $row["package"] . "</td>";
                        echo "<td>" . $row["date"] . "</td>";
                        echo "<td>
                        <a onclick=\"confirm('Are you sure you want to dismiss this order ?')\" class='btn btn-danger p-1' href='handlers/dismiss-order.php?id=" . $row["id"] . "'>Dismiss</a>
                    
                        <a onclick=\"confirm('Are you sure you want to confirm this order ?')\" class='btn btn-success p-1' href='handlers/confirm-order.php?id=" . $row["id"] . "&referral=" . $row["referral"] . "&ammount=" . $row["package"] . "'>Confirm Order</a>
                    </td>";
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

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>

  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
</body>

</html>