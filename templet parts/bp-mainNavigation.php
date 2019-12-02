<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

        <a class="logo-wrapper waves-effect">
            <img src="https://tfcportal.com/img/techfusion_logo.png" class="img-fluid" alt="">
        </a>

        <div class="list-group list-group-flush">
            <?php
            $url = $_SERVER['REQUEST_URI'];
            if (($url == "/customer%20relationship%20management/dashboardCRM.php")|| (preg_match($url, 'editFormCRM.php') == false) || (preg_match
                    ($url, 'deleteCRMEntry.php') == false)){?>
                <a id="MainDashNav1" href="../business system/page-dashboard.php" class="list-group-item waves-effect">
                    <i class="fas fa-chart-pie mr-3"></i>Main Dashboard
                </a>
            <?php
            }
            else{?>
                <a id="MainDashNav1" href="../business system/page-dashboard.php" class="list-group-item
                waves-effect active">
                    <i class="fas fa-chart-pie mr-3"></i>Main Dashboard
                </a>
            <?php
                echo 'good day';
            }
            ?>
            <a id="CRMDashNav1" href="https://tfcportal.com/business system/customer relationship management/dashboardCRM.php"
               class="list-group-item
            list-group-item-action waves-effect">
                <i class="fas fa-user mr-3"></i>CRM Dashboard</a>
            <a id="CRMFormNav1" href="https://tfcportal.com/business system/customer relationship management/formCRM.php"
               class="list-group-item
            list-group-item-action waves-effect">
                <i class="fas fa-user-plus mr-3"></i>Create New Customer</a>
            <a id="IntakeDashNav1" href="https://tfcportal.com/business system/device intake/dashboardIntake.php" class="list-group-item
            list-group-item-action
            waves-effect">
                <i class="fas fa-laptop-medical mr-3"></i>Intake Dashboard</a>
            <a id="IntakeFormNav1" href="https://tfcportal.com/business system/device intake/formIntake.php" class="list-group-item
            list-group-item-action waves-effect">
                <i class="fas fa-laptop-medical mr-3"></i>Create New Intake Ticket</a>
            <a id="PODashNav1" href="https://tfcportal.com/business system/purchase order/dashboardPO.php" class="list-group-item
            list-group-item-action waves-effect">
                <i class="fas fa-list-alt mr-3"></i>PO Dashboard</a>
            <a id="POFormNav1" href="https://tfcportal.com/business system/purchase order/formPO.php" class="list-group-item
            list-group-item-action
            waves-effect">
                <i class="fas fa-list-alt mr-3"></i>Create New PO</a>
            <a id="QuoteDashNav1" href="https://tfcportal.com/business system/quote system/dashboardQuote.php" class="list-group-item
            list-group-item-action waves-effect">
                <i class="fas fa-file-invoice mr-3"></i>Quote Dashboard</a>
            <a id="QuoteFormNav1" href="https://tfcportal.com/business system/quote system/formQuote.php" class="list-group-item
            list-group-item-action
            waves-effect">
                <i class="fas fa-file-invoice mr-3"></i>Create New Quote</a>
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
                <ul class="nav mr-auto nav-justified">
                    <li id="MainDashNav2" class="nav-item">
                        <a class="nav-link waves-effect" href="https://tfcportal.com/business system/page-dashboard.php">Dashboard
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Users</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">New User</a>
                            <a class="dropdown-item" href="#">All Users</a>
                            <a class="dropdown-item" href="#">User Groups</a>
                            <a class="dropdown-item" href="#">User Roles</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Customer relationship management (CRM)</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="https://tfcportal.com/business system/customer relationship management/leads and prospects/dashboardLead.php">Leads / Prospects</a>
                            <a class="dropdown-item" href="https://tfcportal.com/business system/customer relationship management/leads and prospects/formLead.php">Create Lead / Prospect</a>
                            <a class="dropdown-item" href="https://tfcportal.com/business system/customer relationship management/customers/dashboardCustomer.php">Customers / Former Customers</a>
                            <a class="dropdown-item" href="https://tfcportal.com/business system/customer relationship management/customers/formCustomer.php">Create Customer</a>
                            <a class="dropdown-item" href="https://tfcportal.com/business system/customer relationship management/clinets/dashboardClient.php">Clients</a>
                            <a class="dropdown-item" href="https://tfcportal.com/business system/customer relationship management/clinets/formClient.php">Create Client</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Support Tickets</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="https://tfcportal.com/business system/device intake/dashboardIntake.php">Intake Tickets</a>
                            <a class="dropdown-item" href="https://tfcportal.com/business system/device intake/formIntake.php">Create Intake Ticket</a>
                            <a class="dropdown-item" href="https://tfcportal.com/business system/website tickets/dashboardWebsite.php">Website Tickets</a>
                            <a class="dropdown-item" href="https://tfcportal.com/business system/website tickets/formNewWebsite.php">Create New Website Ticket</a>
                            <a class="dropdown-item" href="#">Create Website Ticket</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Accounting & Billing</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="https://tfcportal.com/business system/quote system/dashboardQuote.php">Quotes</a>
                            <a class="dropdown-item" href="https://tfcportal.com/business system/quote system/formQuote.php">Create Quote</a>
                            <a class="dropdown-item" href="#">Invoices</a>
                            <a class="dropdown-item" href="#">Create Invoice</a>
                            <a class="dropdown-item" href="https://tfcportal.com/business system/purchase order/dashboardPO.php">Purchase Orders</a>
                            <a class="dropdown-item" href="https://tfcportal.com/business system/purchase order/formPO.php">Create Purchase Order</a>
                        </div>
                    </li>
                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <button id="btnLogout"class="nav-link border border-light rounded waves-effect">
                            Log Out <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->
</header>