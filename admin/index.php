<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>
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
                  <h4 class="card-title mb-5">Account Activation</h4>
                  <table class="table table-bordered">
                    <thead>
                      <tr class="text-center">
                        <th> # </th>
                        <th> Referral </th>
                        <th> Username </th>
                        <!-- <th> Package </th> -->
                        <th> </th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php
                      include_once "classes/db.php";
                      include_once "classes/member.php";
                      $db = new Db();
                      $member = new Member($db->getConnection());
                      $res = $member->selectNotActivatedAccounts();

                      $index = 0;
                      while ($row = $res->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . ++$index . "</td>";
                        echo "<td>" . $row["my_referral"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        // echo "<td>" . $row["currentPackage"] . "</td>";
                        echo '<td><a href="handlers/activate-account.php?id='.$row["id"].'" onclick="return confirm(\'Are you sure you want to activate this account?\')">Activate Account</a></td>';
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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const viewDetailsButtons = document.querySelectorAll('.view-details-btn');
      viewDetailsButtons.forEach(button => {
        button.addEventListener('click', function() {
          const username = this.getAttribute('data-username');
          const email = this.getAttribute('data-email');
          const address = this.getAttribute('data-address');
          const city = this.getAttribute('data-city');

          document.getElementById('modal-title').innerText = 'Order Details for ' + username;
          document.getElementById('modal-body').innerHTML = `
            <p><strong>Username:</strong> ${username}</p>
            <p><strong>Email:</strong> ${email}</p>
            <p><strong>Address:</strong> ${address}</p>
            <p><strong>City:</strong> ${city}</p>
          `;
        });
      });
    });
  </script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>

  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
</body>

</html>