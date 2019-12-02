<?php

include '../config.php';

$queryTable1 = "SELECT * FROM ticket WHERE ((ticketStatus = 'open') || (ticketStatus = 'In Progress') || (ticketStatus = 'Completed') || (ticketStatus = 'Contacted') || (ticketStatus = 'Reopened') || (ticketStatus = ''))  ORDER BY ticketID desc";
$resultTable1 = mysqli_query($conn, $queryTable1);

$queryTable2 = "SELECT * FROM ticket WHERE (ticketStatus = 'Closed')  ORDER BY ticketID desc";
$resultTable2 = mysqli_query($conn, $queryTable2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Intake Dashboard</title>

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
                <table id="IntakeOne_data" data-order='[[ 0, "desc" ]]' class="table table-striped">
                    <thead>
                    <tr>
                        <td>TicketID</td>
                        <td>Status</td>
                        <td>Customer/Client Uid</td>
                        <td>Computer Description</td>
                        <td>Computer Issue</td>
                        <td>Assignee</td>
                        <td>Priority</td>
                        <td>Edit & Create PO</td>
                        <td>Delete</td>
                    </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_array($resultTable1)) {
                        $tickestatus = $row["ticketStatus"];
                        $tickepriority = $row["ticketPriority"];

                        ?>
                        <tr>
                            <td><?php echo $row["ticketID"] ?></td>
                            <td>
                                <?php
                                if ($tickestatus == 'Open') { ?>
                                    <span class="badge badge-pill"
                                          style="background-color: #7CFC00"><?php echo $row["ticketStatus"] ?></span>
                                    <?php
                                } elseif ($tickestatus == 'In Progress') { ?>
                                    <span class="badge badge-pill"
                                          style="background-color: #32CD32"><?php echo $row["ticketStatus"] ?></span>
                                    <?php
                                } elseif ($tickestatus == 'Completed') { ?>
                                    <span class="badge badge-pill"
                                          style="background-color: #228B22"><?php echo $row["ticketStatus"] ?></span>
                                    <?php
                                } elseif ($tickestatus == 'Contacted') { ?>
                                    <span class="badge badge-pill"
                                          style="background-color: #FA8072"><?php echo $row["ticketStatus"] ?></span>
                                    <?php
                                } elseif ($tickestatus == 'Reopened') { ?>
                                    <span class="badge badge-pill"
                                          style="background-color: #0000CD"><?php echo $row["ticketStatus"] ?></span>
                                    <?php
                                } else {
                                    echo $row["ticketStatus"];
                                }
                                ?>

                            </td>
                            <td><?php echo $row["uid"] ?></td>
                            <td><?php echo $row["computerDes"] ?></td>
                            <td><?php echo $row["computerIsu"] ?></td>
                            <td>
                                <?php
                                if (($row["assignee1"] != 'Not Assigned') && ($row["assignee2"] != 'Not Assigned')){
                                    echo ($row["assignee1"] . ',' . $row["assignee2"]);
                                }
                                else{
                                    if ($row["assignee1"] != 'Not Assigned'){
                                        echo $row["assignee1"];
                                    }
                                    else if ($row["assignee2"] != 'Not Assigned'){
                                        echo $row["assignee2"];
                                    }
                                    else{
                                        echo $row["assignee1"];
                                    }
                                }
                                ?></td>
                            <td>
                                <?php
                                if ($tickepriority == 'Medium') { ?>
                                    <span class="badge badge-pill"
                                          style="background-color: #ffc107"><?php echo $row["ticketPriority"] ?></span>
                                    <?php
                                } elseif ($tickepriority == 'High') { ?>
                                    <span class="badge badge-pill"
                                          style="background-color: #dc3545"><?php echo $row["ticketPriority"] ?></span>
                                    <?php
                                } elseif ($tickepriority == 'Low') { ?>
                                    <span class="badge badge-pill"
                                          style="background-color: #28a745"><?php echo $row["ticketPriority"] ?></span>
                                    <?php
                                } else {
                                    echo $row["ticketPriority"];
                                }
                                ?>
                            </td>
                            <td>
                                <a href="editFormIntake.php?id=<?php echo $row["ticketID"] ?>">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Edit <i class="fas fa-edit fa-lg"></i></button>
                                </a>
                                <a href="../purchase order/formPO.php?id=<?php echo $row["ticketID"] ?>">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Create PO <i class="fas fa-list-alt fa-lg"></i></button>
                                </a>
                            </td>
                            <td>
                                <a href="deleteIntakeEntry.php?id=<?php echo $row["ticketID"] ?>">
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
            <br/>
            <br/>
            <div class="table-responsive">
                <table id="IntakeTwo_data" data-order='[[ 0, "desc" ]]' class="table table-striped">
                    <thead>
                    <tr>
                        <td>TicketID</td>
                        <td>Status</td>
                        <td>Customer/Client Uid</td>
                        <td>Computer Description</td>
                        <td>Computer Issue</td>
                        <td>Priority</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_array($resultTable2)) {
                        $tickestatus = $row["ticketStatus"];
                        $tickepriority = $row["ticketPriority"];
                        if ($tickestatus == 'Closed') {
                            ?>
                            <tr>
                                <td><?php echo $row["ticketID"] ?></td>
                                <td>
                                    <?php
                                    if ($tickestatus == 'Closed') { ?>
                                        <span class="badge badge-pill"
                                              style="background-color: #FF0000"><?php echo $row["ticketStatus"] ?></span>
                                        <?php

                                    } else {
                                        echo $row["ticketStatus"];
                                    }
                                    ?>

                                </td>
                                <td><?php echo $row["uid"] ?></td>
                                <td><?php echo $row["computerDes"] ?></td>
                                <td><?php echo $row["computerIsu"] ?></td>
                                <td>
                                    <?php
                                    if ($tickepriority == 'Medium') { ?>
                                        <span class="badge badge-pill"
                                              style="background-color: #ffc107"><?php echo $row["ticketPriority"] ?></span>
                                        <?php
                                    } elseif ($tickepriority == 'High') { ?>
                                        <span class="badge badge-pill"
                                              style="background-color: #dc3545"><?php echo $row["ticketPriority"] ?></span>
                                        <?php
                                    } elseif ($tickepriority == 'Low') { ?>
                                        <span class="badge badge-pill"
                                              style="background-color: #28a745"><?php echo $row["ticketPriority"] ?></span>
                                        <?php
                                    } else {
                                        echo $row["ticketPriority"];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="editFormIntake.php?id=<?php echo $row["ticketID"] ?>">
                                        <button type="button" class="btn btn-sm btn-primary btn-rounded">Edit <i class="fas fa-edit fa-lg"></i></button>
                                    </a>
                                </td>
                                <td>
                                    <a href="deleteIntakeEntry.php?id=<?php echo $row["ticketID"] ?>">
                                        <button type="button" class="btn btn-sm btn-primary btn-rounded">Delete <i class="fas fa-trash fa-lg"></i></button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
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
require '../../libraries/includes-footer.php';
?>



<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="../../js/addons/datatables.min.js"></script>

<!-- DataTables Select JS -->
<script type="text/javascript" src="../../js/addons/datatables-select.min.js"></script>

<script>

    $(document).ready(function () {
        $('#IntakeOne_data').DataTable();
        $('#IntakeTwo_data').DataTable();
    });

</script>

</body>

</html>
