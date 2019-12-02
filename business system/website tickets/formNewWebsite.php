<?php

$uid = $_GET['uid'];

if ($uid != ''){

    include '../config.php';

    $result = $conn->query("SELECT * FROM clients WHERE uid = '$uid'");
    $client = $result->fetch_assoc();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>New Website From</title>

    <!-- Google Firebase Auth -->
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-auth.js"></script>

    <script type="text/javascript" src="../../js/login business portal/config.js"></script>

    <script type="text/javascript" src="../../js/login business portal/enforcer.js"></script>

    <?php
    include '../../libraries/includes-header.php';
    ?>

</head>

<body class="grey lighten-3">

<?php include '../../templet parts/bp-mainNavigation.php'; ?>

<!--Main layout-->
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

        <!-- Main Content Goes Here -->
        <div align="center">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">New Website From</h1>
                    <p class="lead">Please fill out all fields bellow.</p>
                </div>
            </div>
            <form action="newWebsiteEntry.php" method="POST">

                <div class="form-group col-md-6" align="left">
                    <label for="clinetuid">Client UID:</label>
                    <input
                            type="text"
                            class="form-control"
                            id="clinetuid"
                            placeholder=""
                            name="clinetuid"
                            value="<?php echo $client['uid']?>"
                    />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="fname">First Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="fname"
                        placeholder=""
                        name="fname"
                        value="<?php echo $client['fname']?>"
                    />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="lname">Last Name:</label>
                    <input
                            type="text"
                            class="form-control"
                            id="lname"
                            placeholder=""
                            name="lname"
                            value="<?php echo $client['lname']?>"
                    />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="clientCompanyName">Client Company Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="clientCompanyName"
                        placeholder=""
                        name="clientCompanyName"
                        value="<?php echo $client['companyName']?>"
                    />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="clientEmail">Client Email:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="clientEmail"
                        placeholder=""
                        name="clientEmail"
                        value="<?php echo $client['email']?>"
                    />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="clientPhone">Client Phone:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="clientPhone"
                        placeholder=""
                        name="clientPhone"
                    />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="clientDomain">Client Domain:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="clientDomain"
                        placeholder=""
                        name="clientDomain"
                    />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="clientTestingDomain">Client Testing Domain:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="clientTestingDomain"
                        placeholder=""
                        name="clientTestingDomain"
                    />
                </div>

                <!--<div>
                    <div class="form-group col-md-6" align="left">
                        <label for="clientInvoiceOne">Client Invoice #1:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="clientInvoiceOne"
                            placeholder=""
                            name="clientInvoiceOne"
                        />
                    </div>
                    <div class="form-group col-md-6" align="left">
                        <label for="clientInvoiceTwo">Client Invoice #2:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="clientInvoiceTwo"
                            placeholder=""
                            name="clientInvoiceTwo"
                        />
                    </div>
                </div>-->

                <!--Make it so that there is a list of groups and users that can be selested-->
                <div class="form-group col-md-6" align="left">
                    <label for="assignedTeam">Team Members: Assign Group or Individuals to Ticket</label>
                    <select id="assignedTeam" class="form-control" name="assignedTeam">
                        <option selected></option>
                        <option value=""></option>
                    </select>
                </div>

                <!--Make it so that there is a list of groups and users that can be selested-->
                <div class="form-group col-md-6" align="left">
                    <label for="assignedAccountManager">Account Manager: Assign Group or Individuals to Ticket</label>
                    <select id="assignedAccountManager" class="form-control" name="assignedAccountManager">
                        <option selected></option>
                        <option value=""></option>
                    </select>
                </div>

                <h3>Website Progress</h3>

                <div class="form-group col-md-6" align="left">
                    <label for="websiteProgress">Website Progress</label>
                    <select id="websiteProgress" class="form-control" name="websiteProgress">
                        <option selected></option>
                        <option value="Assigning Dedicated Team">Assigning Dedicated Team</option>
                        <option value="Content Checklist in Progress">Content Checklist in Progress</option>
                        <option value="Rough Draft in Progress">Rough Draft in Progress</option>
                        <option value="Final Website in Progress">Final Website in Progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>

                <div class="form-group col-md-6" align="left">
                    <label for="ticketStatus">Ticket Status</label>
                    <select id="ticketStatus" class="form-control" name="ticketStatus">
                        <option value="In Progress" selected>In Progress</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>

        </div>


                <div class="form-group col-md-6" align="left">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>


    </div>
</main>
<!--Main layout-->

<!--Footer-->
<footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">

    </div>
    <!--/.Call to action-->

    <!--Copyright-->
    <div class="footer-copyright py-3">
        © 2019 Copyright:
        <a href="https://techfusionconsulting.com/" target="_blank"> Tech Fusion LLC </a>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

<?php
require '../../libraries/includes-footer.php';
?>


</body>

</html>