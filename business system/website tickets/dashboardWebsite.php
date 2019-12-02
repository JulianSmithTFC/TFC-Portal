<?php

include '../config.php';

$query1 = "SELECT * FROM newWebsiteTicket WHERE (websiteProgress != 'Completed') ORDER BY websiteTicketID DESC";
$result1 = mysqli_query($conn, $query1);

$query2 = "SELECT * FROM newWebsiteTicket WHERE (websiteProgress = 'Completed') ORDER BY websiteTicketID DESC";
$result2 = mysqli_query($conn, $query2);

include 'parts/functions-trello.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Website Dashboard</title>

    <!-- Google Firebase Auth -->
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-auth.js"></script>

    <script type="text/javascript" src="../../js/login business portal/config.js"></script>

    <script type="text/javascript" src="../../js/login business portal/enforcer.js"></script>

    <?php
    include '../../libraries/includes-header.php';
    ?>

    <!-- DataTables Select CSS -->
    <link href="../../css/addons/datatables-select.min.css" rel="stylesheet">

    <!-- MDBootstrap Datatables  -->
    <link href="../../css/addons/datatables.min.css" rel="stylesheet">

</head>

<body class="grey lighten-3">

<?php include '../../templet parts/bp-mainNavigation.php'; ?>

<!--Main layout-->
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

        <!-- Main Content Goes Here -->
        <div>

            <div class="table-responsive">
                <h3>New Website Tickets</h3>
                <table id="workingTickets" data-order='[[ 0, "desc" ]]' class="table table-striped">
                    <thead>
                    <tr>
                        <td>Progress %</td>
                        <td>Client Name</td>
                        <td>Company Name</td>
                        <td>Email</td>
                        <td>Account Manager</td>
                        <td>Trello & Dev Sandbox</td>
                        <td>Edit or Delete</td>

                    </tr>
                    </thead>
                    <?php
                    setlocale(LC_MONETARY, 'en_US.UTF-8');
                    while ($row = mysqli_fetch_array($result1)) {

                        $copiedBoardID = $row["trelloID"];
                        $progressBoard = getBoardProgress($copiedBoardID);

                        ?>
                        <tr>
                            <td><?php echo $progressBoard?>% Completed</td>
                            <td><?php echo ($row["fname"] . ' ' . $row["lname"]) ?></td>
                            <td><?php echo $row["clientCompanyName"] ?></td>
                            <td><?php echo $row["clientEmail"] ?></td>
                            <td><?php echo $row["assignedAccountManager"] ?></td>
                            <td>
                                <a href="<?php echo $row["websiteTrelloLink"] ?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Trello <i class="fab fa-trello  fa-lg"></i></button>
                                </a>
                                <a href="<?php echo $row["clientTestingDomain"] ?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Sandbox <i class="fas fa-flask"></i></button>
                                </a>
                            </td>
                            <td>
                                <a href="editFormNewWebsite.php?id=<?php echo $row["websiteTicketID"] ?>">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Edit <i class="fas fa-edit fa-lg"></i></button>
                                </a>
                                <a href="deleteNewWebsiteEntry.php?id=<?php echo $row["websiteTicketID"] ?>">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Delete <i class="fas fa-trash fa-lg"></i></button>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>

            <br/>

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

<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="../../js/addons/datatables.min.js"></script>

<!-- DataTables Select JS -->
<script type="text/javascript" src="../../js/addons/datatables-select.min.js"></script>

<script>

    $(document).ready(function () {
        $('#workingTickets').DataTable();
        $('#po_purchased').DataTable();
        $('#po_recorded').DataTable();
    });

</script>

</body>

</html>
