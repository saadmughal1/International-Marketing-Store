<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Deposit Slips</title>
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
                                    <h4 class="card-title mb-5">All Slips</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th> # </th>
                                                <th> Referral </th>
                                                <th> Username </th>
                                                <th> Amount </th>
                                                <th>Transaction Id</th>
                                                <th>Account Number</th>
                                                <th>Comment</th>
                                                <th>Screenshot</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <?php
                                            include_once "classes/db.php";
                                            include_once "classes/transaction_slip.php";
                                            include_once "classes/member.php";
                                            $db = new Db();
                                            $transaction_slip = new Transaction_slip($db->getConnection());
                                            $res = $transaction_slip->getAllSlips();
                                            $member = new Member($db->getConnection());
                                            $index = 0;
                                            while ($row = $res->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . ++$index . "</td>";
                                                echo "<td>" . $row["referral"] . "</td>";
                                                echo "<td>" . $member->getMemberByReferral($row["referral"])->fetch_assoc()["username"] . "</td>";
                                                echo "<td>" . $row["amount"] . " Rs</td>";
                                                echo "<td>" . $row["tid"] . "</td>";
                                                echo "<td>" . $row["accno"] . "</td>";
                                                echo "<td>" . $row["comment"] . "</td>";

                                                if (!empty($row['screenshot'])) {
                                                    echo "<td><a target='_blank' href='../assets/documents/" . $row['screenshot'] . "'>View Slip</a></td>";
                                                } else {
                                                    echo "<td></td>";
                                                }
                                                echo "<td><a href='handlers/delete-slip.php?id=" . $row["id"] . "'>Delete</a></td>";
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