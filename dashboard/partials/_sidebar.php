<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <?php
    include_once "classes/db.php";
    include_once "classes/member.php";
    $db = new Db();
    $member = new Member($db->getConnection(), $_SESSION["member_id"]);
    $myStatus = $member->accountStatus()->fetch_assoc()["status"];

    ?>


    <li class="nav-item">
      <a class="nav-link" href="./">
        <span class="menu-title">My Dashboard</span>
      </a>
    </li>



    <?php
    if ($myStatus == 0) {
    ?>

      <li class="nav-item">
        <a class="nav-link" href="purchase-package">
          <span class="menu-title">Purchase Package</span>
        </a>
      </li>

    <?php } else {
    ?>
      <li class="nav-item">
        <a class="nav-link" href="update-package">
          <span class="menu-title">Update Package</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="withdrawal-request">
          <span class="menu-title">Withdrawal Request</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="submit-kyc">
          <span class="menu-title">Submit KYC</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="direct-income">
          <span class="menu-title">Direct Income</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="in-directt-income">
          <span class="menu-title">In-Direct Income</span>
        </a>
      </li>

    <?php } ?>

    <li class="nav-item">
      <a class="nav-link" href="copy-referal">
        <span class="menu-title">Referal Code</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="send-deposit-proof">
        <span class="menu-title">Send Deposit Proof</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="change-password">
        <span class="menu-title">Change Password</span>
      </a>
    </li>

  </ul>
</nav>