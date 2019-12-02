 <?php

include '../config.php';

// Get the customer ID.
$websiteTicketID = intval($_GET['id']);

// If form was submitted, update the customer.
if (!empty($_POST['websiteTicketID'])) {
    $webTicketUpdated = true;
    $sql = "UPDATE newWebsiteTicket
        SET
            clientName=?,
            clientCompanyName = ?,
            clientEmail = ?,
            clientPhone = ?,
            clientDomain = ?,
            clientTestingDomain = ?,
            clientInvoiceOne = ?,
            clientInvoiceTwo = ?,
            assignedTeam = ?,
            assignedAccountManager = ?,
            websiteProgress = ?,
            ticketStatus = ?
            WHERE websiteTicketID = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die($conn->error);
    }
    $stmt->bind_param(
        'ssssssssssssi',
        $_POST['clientName'],
        $_POST['clientCompanyName'],
        $_POST['clientEmail'],
        $_POST['clientPhone'],
        $_POST['clientDomain'],
        $_POST['clientTestingDomain'],
        $_POST['clientInvoiceOne'],
        $_POST['clientInvoiceTwo'],
        $_POST['assignedTeam'],
        $_POST['assignedAccountManager'],
        $_POST['websiteProgress'],
        $_POST['ticketStatus'],
        $_POST['websiteTicketID']
    );
    $stmt->execute();
    if ($stmt->error) {
        die($stmt->error);
    }
    $stmt->close();
}
// Load the customer.
$result = $conn->query("SELECT * FROM newWebsiteTicket WHERE websiteTicketID = {$websiteTicketID}") or die($conn->error);
$web = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit New Website From</title>

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
                    <?php if ($webTicketUpdated) : ?>
                        <div class="alert alert-success">Purchase order updated.</div>
                    <?php endif; ?>
                </div>
            </div>
            <form action="newWebsiteEntry.php" method="POST">

                <div class="form-group col-md-6" align="left">
                    <label for="clientName">Client Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="clientName"
                        placeholder=""
                        name="clientName"
                        value="<?= $web['clientName'] ?>"
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
                        value="<?= $web['clientCompanyName'] ?>"
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
                        value="<?= $web['clientEmail'] ?>"
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
                        value="<?= $web['clientPhone'] ?>"
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
                        value="<?= $web['clientDomain'] ?>"
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
                        value="<?= $web['clientTestingDomain'] ?>"
                    />
                </div>

                <div>
                    <div class="form-group col-md-6" align="left">
                        <label for="clientInvoiceOne">Client Invoice #1:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="clientInvoiceOne"
                            placeholder=""
                            name="clientInvoiceOne"
                            value="<?= $web['clientInvoiceOne'] ?>"
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
                            value="<?= $web['clientInvoiceTwo'] ?>"
                        />
                    </div>
                </div>

                <!--Make it so that there is a list of groups and users that can be selested-->
                <div class="form-group col-md-6" align="left">
                    <label for="assignedTeam">Team Members: Assign Group or Individuals to Ticket</label>
                    <select id="assignedTeam" class="form-control" name="assignedTeam">
                        <option value="<?= $web['assignedTeam'] ?>" selected><?= $web['assignedTeam'] ?></option>
                        <option value=""></option>
                    </select>
                </div>

                <!--Make it so that there is a list of groups and users that can be selested-->
                <div class="form-group col-md-6" align="left">
                    <label for="assignedAccountManager">Account Manager: Assign Group or Individuals to Ticket</label>
                    <select id="assignedAccountManager" class="form-control" name="assignedAccountManager">
                        <option value="<?= $web['assignedAccountManager'] ?>" selected><?= $web['assignedAccountManager'] ?></option>
                        <option value=""></option>
                    </select>
                </div>

                <h3>Website Progress</h3>

                <div class="form-group col-md-6" align="left">
                    <label for="websiteProgress">Buyer Name</label>
                    <select id="websiteProgress" class="form-control" name="websiteProgress">
                        <option value="<?= $web['websiteProgress'] ?>" selected><?= $web['websiteProgress'] ?></option>
                        <option value="Assigning Dedicated Team">Assigning Dedicated Team</option>
                        <option value="Content Checklist in Progress">Content Checklist in Progress</option>
                        <option value="Rough Draft in Progress">Rough Draft in Progress</option>
                        <option value="Final Website in Progress">Final Website in Progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>

                <div class="form-group col-md-6" align="left">
                    <label for="websiteTrelloLink">Trello Link:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="websiteTrelloLink"
                        placeholder=""
                        name="websiteTrelloLink"
                        value="<?= $web['websiteTrelloLink'] ?>"
                    />
                </div>

                <div class="form-group col-md-6" align="left">
                    <label for="ticketStatus">Ticket Status</label>
                    <select id="ticketStatus" class="form-control" name="ticketStatus">
                        <option value="<?= $web['ticketStatus'] ?>" selected><?= $web['ticketStatus'] ?></option>
                        <option value="In Progress">In Progress</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>

        </div>


        <div class="form-group col-md-6" align="left">
            <input type="hidden" name="websiteTicketID" value="<?= $websiteTicketID ?>">
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
