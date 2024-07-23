<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
  header("LOCATION: ../login");
}
?>


<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo d-block ps-2" href="./"><img src="../FrontEnd/assets/images/logo.png" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">


    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item d-none d-lg-block full-screen-link">
        <a class="nav-link">
          <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
        </a>
      </li>

      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-img">
          </div>
          <div class="nav-profile-text">
            <p class="mb-1 text-black">

              <?php
              if (isset($_SESSION["admin_username"])) {
                echo $_SESSION["admin_username"];
              }
              ?>

            </p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="handlers/logout.php">
            <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
        </div>
      </li>

    </ul>

<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
</button>

  </div>
</nav>