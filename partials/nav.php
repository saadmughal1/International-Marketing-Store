<?php include_once "config.php"; ?>

<div class="navbar-area navbar-style-three fixed-top">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">

                <div class="logo">
                    <a href="./">
                        <img width="100px" src="FrontEnd/assets/images/logo.png" alt="mlm website development in pakistan">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navbar">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light bg-F4F7FC">
                <a class="navbar-brand" href="./">
                    <img width="100px" src="FrontEnd/assets/images/logo.png" alt="">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="./" class="nav-link">Home</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">Company
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="why-us" class="nav-link">Why Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="vision-mission" class="nav-link">Vision & Mission</a>
                                </li>
                                <li class="nav-item">
                                    <a href="our-management" class="nav-link">Our Management</a>
                                </li>
                                <li class="nav-item">
                                    <a href="our-values" class="nav-link">Our Values</a>
                                </li>
                                <li class="nav-item">
                                    <a href="our-philosophy" class="nav-link">Our Philosophy</a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="Packages-plans" class="nav-link">Packages</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="ProductList" class="nav-link">Products</a>
                        </li> -->

                        <li class="nav-item">
                            <a href="#" class="nav-link">Account
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="login" class="nav-link">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a href="signup" class="nav-link">Register</a>
                                </li>
                            </ul>
                        </li>



                        <li class="nav-item">
                            <a href="contact-us" class="nav-link">Contact</a>
                        </li>

                    </ul>

                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                        </div>
                        <div class="option-item">
                            <div class="call-us-box">
                                <div class="icon">
                                    <i class="flaticon2-hourglass-1"></i>
                                </div>
                                <span>Call/WhatsApp</span>
                                <a href="https://wa.me/<?php echo CONTACT_NUMBER; ?>" target="_blank">
                                    <?php echo CONTACT_NUMBER . "<br>" . "Kokab Noreni"; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>

                </div>
            </div>
            <div class="container">
                <div class="option-inner">
                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <a href="#" class="search-box"><i class="ri-search-line"></i></a>
                        </div>
                        <div class="option-item">
                            <div class="call-us-box">
                                <div class="icon">
                                    <i class="flaticon-phone-call"></i>
                                </div>
                                <span>Call/WhatsApp</span>
                                <a href="https://wa.me/" target="_blank">
                                    <?php echo CONTACT_NUMBER . "<br>" . "Kokab Noreni"; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>