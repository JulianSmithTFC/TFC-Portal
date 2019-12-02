<?php

include '../../config.php';

$queryTable = "SELECT * FROM customers ORDER BY customerID DESC";
$resultTable = mysqli_query($conn, $queryTable);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Customer Dashboard</title>

    <!-- Google Firebase Auth -->
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-auth.js"></script>

    <script type="text/javascript" src="../../../js/login business portal/config.js"></script>

    <script type="text/javascript" src="../../..//login business portal/enforcer.js"></script>

    <?php
    include '../../../libraries/includes-header.php';
    ?>

    <!-- DataTables Select CSS -->
    <link href="../../../css/addons/datatables-select.min.css" rel="stylesheet">

    <!-- MDBootstrap Datatables  -->
    <link href="../../../css/addons/datatables.min.css" rel="stylesheet">

</head>

<body class="grey lighten-3">


<?php include '../../../templet parts/bp-mainNavigation.php'; ?>


<!--Main layout-->
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

        <!-- Main Content Goes Here -->
        <div>
            <div class="table-responsive">
                <h3>Customers</h3>
                <table id="employeeTwo_data" data-order='[[ 0, "desc" ]]' data-page-length='5' class="table table-striped">
                    <thead>
                    <tr>
                        <td>Customer ID</td>
                        <td>UID</td>
                        <td>Name</td>
                        <td>Company Name</td>
                        <td>Cell #</td>
                        <td>Email</td>
                        <td>Edit, Create Ticket, Create Quote, Delete</td>
                    </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_array($resultTable)) {

                        $uid = $row['uid'];

                        ?>

                        <tr>
                            <td><?php echo $row["customerID"] ?></td>
                            <td><?php echo $row["uid"] ?></td>
                            <td><?php echo ($row["fname"] . ' ' . $row["lname"]) ?></td>
                            <td><?php echo $row["companyName"]  ?></td>
                            <td><?php echo $row["cellPhone"]  ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td>

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php $row["uid"] ?>" onclick="test<?php $row["uid"] ?>()">Launch demo modal</button>

                                <a href="editFormCustomer.php?id=<?php echo $row["customerID"] ?>">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Edit <i class="fas fa-edit fa-lg"></i></button>
                                </a>
                                <a href="../../device intake/formIntake.php?id=<?php echo $row["customerID"] ?>" >
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Create Ticket <i class="fas fa-laptop-medical fa-lg"></i></button>
                                </a>
                                <a href="../../quote system/formQuote.php?uid=<?php echo $row["uid"] ?>" >
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Create Quote <i class="fas fa-file-invoice fa-lg"></i></button>
                                </a>
                                <a href="deleteCustomerEntry.php?id=<?php echo $row["customerID"] ?>" >
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Delete <i class="fas fa-trash fa-lg"></i></button>
                                </a>
                            </td>
                            <div id="div<?php $row["uid"] ?>">

                            </div>
                        </tr>

                        <script>
                        function test<?php $row["uid"] ?>(){
                            $( "#div<?php $row["uid"] ?>" ).load( "quickView.php" );
                        }
                        </script>
                        <?php
                    }
                    ?>
                </table>
            </div>
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
require '../../../libraries/includes-footer.php';
?>

<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="../../../js/addons/datatables.min.js"></script>

<!-- DataTables Select JS -->
<script type="text/javascript" src="../../../js/addons/datatables-select.min.js"></script>

<script>

    $(document).ready(function () {
        $('#employeeOne_data').DataTable();
        $('#employeeTwo_data').DataTable();
        $('#employeeThree_data').DataTable();

    });

</script>



</body>

</html>

<?php

if ($ticketCount > 0) {
    ticket($resultTicket);
}

if($quoteCount > 0){
    quote($resultQuotes);
}

if($newWebTicketCount > 0){
    newWebTicket($resultNewWebsiteTicket);
}

function ticket($resultTicket)
{
    ?>
    <div>
    <h2>Intake Tickets</h2>
    <?php
    while ($ticket = mysqli_fetch_array($resultTicket))
    {
        ?>
        <div>
            <h4><?php echo $ticket['computerDes'] ?></h4>
            <p><?php echo $ticket['computerIsu'] ?></p>
            <a href="../../device intake/editFormIntake.php?id=<?php echo $ticket["ticketID"] ?>">
                <b class="btn btn-primary">Open Ticket</b>
            </a>
        </div>
        <?php
    }
}
function quote($resultQuotes)
{
    ?>
    <div>
        <h2>Quotes</h2>
        <?php
        while ($quote = mysqli_fetch_array($resultQuotes))
        {
            ?>
            <div>
                <h4>Quote #<?php echo $quote['quoteID'] ?></h4>
                <p>Quote Total <?php echo $quote['quoteTotal'] ?></p>
                <a href="../../quote system/editFormQuote.php?id=<?php echo$quote["quoteID"] ?>">
                    <b class="btn btn-primary">Open Quote</b>
                </a>
            </div>
        </div>
        <?php
    }
}

function newWebTicket($resultNewWebsiteTicket)
{
    if($newWebTicketCount > 0){
        ?>
        <div>
            <h2>New Website Tickets</h2>
            <?php
            while ($newWebTicket = mysqli_fetch_array($resultNewWebsiteTicket)) {
                ?>
                <div>
                    <h4><?php echo $newWebTicket['clientCompanyName'] ?></h4>
                    <a href="../../website tickets/editFormNewWebsite.php?id=<?php echo $newWebTicket["websiteTicketID"] ?>">
                        <b class="btn btn-primary">Open Ticket</b>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
}