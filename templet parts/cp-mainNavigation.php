
<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

        <a class="logo-wrapper waves-effect">
            <img src="../img/techfusion_logo.png" class="img-fluid" alt="">
        </a>

        <div class="list-group list-group-flush">

            <a href="" class="list-group-item list-group-item-action waves-effect">
                Test
            </a>

        </div>

    </div>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li id="MainDashNav2" class="nav-item">
                        <a class="nav-link waves-effect" href="">
                            Create Ticket <i class="far fa-plus-square"></i>
                        </a>
                    </li>

                </ul>


                <ul class="navbar-nav">
                    <li class="nav-item dropdown" style="padding-top: 20px; padding-left: 10px; padding-right: 10px">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <p style="font-size: 20px;">
                                <span class="col-lg-3 z-depth-1 nav-profileCircle"><?php echo $initials ?></span> <span style=""><?php echo $name ?></span>
                            </p>
                        </a>
                        <div class="dropdown-menu" style="padding: 20px 20px 20px 20px; font-size: 20px !important;">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cog"></i> Account Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-money-check-alt"></i> Billing
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-plus-square"></i> Create Ticket
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-sign-out-alt"></i> Log Out
                            </a>
                        </div>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->
</header>