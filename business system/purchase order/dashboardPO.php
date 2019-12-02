<?php

include '../config.php';

$query1 = "SELECT * FROM purchaseorders WHERE (poStatus = 'New') ORDER BY poID DESC";
$newResult = mysqli_query($conn, $query1);

$query2 = "SELECT * FROM purchaseorders WHERE (poStatus = 'Purchased') ORDER BY poID DESC";
$purchasedResult = mysqli_query($conn, $query2);

$query3 = "SELECT * FROM purchaseorders WHERE (poStatus = 'Recorded') ORDER BY poID DESC";
$recordedResult = mysqli_query($conn, $query3);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PO Dashboard</title>

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
                <h3>New Purchase Orders</h3>
                <table id="po_new" data-order='[[ 0, "desc" ]]' class="table table-striped">
                    <thead>
                    <tr>
                        <td>Status</td>
                        <td>Purchase Order ID</td>
                        <td>Supplier</td>
                        <td>Creation Date</td>
                        <td>Payment Type</td>
                        <td>Ticket Number</td>
                        <td>Total Cost</td>
                        <td>Print, Edit, & Delete</td>

                    </tr>
                    </thead>
                    <?php
                    setlocale(LC_MONETARY, 'en_US.UTF-8');
                    while ($row = mysqli_fetch_array($newResult)) {
                        ?>
                        <tr>
                            <td><?php echo $row["poStatus"] ?></td>
                            <td><?php echo $row["poID"] ?></td>
                            <td><?php echo $row["supplierName"] ?></td>
                            <td><?php echo $row["creationDate"] ?></td>
                            <td><?php echo $row["paymentType"] ?></td>
                            <td><?php echo $row["ticketNumber"] ?></td>
                            <td>
                                <?php
                                $poTotal = $row["poTotal"];
                                $formatedPoTotal = money_format('%.2n', $poTotal);
                                echo $formatedPoTotal
                                ?>
                            </td>
                            <td>
                                <a href="generatePDF.php?id=<?php echo $row["poID"] ?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">View/Print <i class="fas fa-file-pdf fa-lg"></i></button>
                                </a>
                                <a href="editFormPO.php?id=<?php echo $row["poID"] ?>">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Edit <i class="fas fa-edit fa-lg"></i></button>
                                </a>
                                <a href="deletePOEntry.php?id=<?php echo $row["poID"] ?>">
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

            <div class="table-responsive">
                <h3>Purchased Purchase Orders</h3>
                <table id="po_purchased" data-order='[[ 0, "desc" ]]' class="table table-striped">
                    <thead>
                    <tr>
                        <td>Status</td>
                        <td>Purchase Order ID</td>
                        <td>Supplier</td>
                        <td>Creation Date</td>
                        <td>Payment Type</td>
                        <td>Ticket Number</td>
                        <td>Total Cost</td>
                        <td>Print, Edit, & Delete</td>

                    </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_array($purchasedResult)) {
                        ?>
                        <tr>
                            <td><?php echo $row["poStatus"] ?></td>
                            <td><?php echo $row["poID"] ?></td>
                            <td><?php echo $row["supplierName"] ?></td>
                            <td><?php echo $row["creationDate"] ?></td>
                            <td><?php echo $row["paymentType"] ?></td>
                            <td><?php echo $row["ticketNumber"] ?></td>
                            <td>
                                <?php
                                $poTotal = $row["poTotal"];
                                $formatedPoTotal = money_format('%.2n', $poTotal);
                                echo $formatedPoTotal
                                ?>
                            </td>

                            <td>
                                <a href="generatePDF.php?id=<?php echo $row["poID"] ?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">View/Print <i class="fas fa-file-pdf fa-lg"></i></button>
                                </a>
                                <a href="editFormPO.php?id=<?php echo $row["poID"] ?>">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Edit <i class="fas fa-edit fa-lg"></i></button>
                                </a>
                                <a href="deletePOEntry.php?id=<?php echo $row["poID"] ?>">
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

            <div class="table-responsive">
                <h3>Recorded Purchase Orders</h3>
                <table id="po_recorded" data-order='[[ 0, "desc" ]]' class="table table-striped">
                    <thead>
                    <tr>
                        <td>Status</td>
                        <td>Purchase Order ID</td>
                        <td>Supplier</td>
                        <td>Creation Date</td>
                        <td>Payment Type</td>
                        <td>Ticket Number</td>
                        <td>Total Cost</td>
                        <td>Print, Edit, & Delete</td>

                    </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_array($recordedResult)) {
                        ?>
                        <tr>
                            <td><?php echo $row["poStatus"] ?></td>
                            <td><?php echo $row["poID"] ?></td>
                            <td><?php echo $row["supplierName"] ?></td>
                            <td><?php echo $row["creationDate"] ?></td>
                            <td><?php echo $row["paymentType"] ?></td>
                            <td><?php echo $row["ticketNumber"] ?></td>
                            <td>
                                <?php
                                $poTotal = $row["poTotal"];
                                $formatedPoTotal = money_format('%.2n', $poTotal);
                                echo $formatedPoTotal
                                ?>
                            </td>

                            <td>
                                <a href="generatePDF.php?id=<?php echo $row["poID"] ?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">View/Print <i class="fas fa-file-pdf fa-lg"></i></button>
                                </a>
                                <a href="editFormPO.php?id=<?php echo $row["poID"] ?>">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Edit <i class="fas fa-edit fa-lg"></i></button>
                                </a>
                                <a href="deletePOEntry.php?id=<?php echo $row["poID"] ?>">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Delete <i class="fas fa-trash fa-lg"></i></button>
                                </a>
                            </td>
                        </tr>
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
require '../../libraries/includes-footer.php';
?>

<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="../../js/addons/datatables.min.js"></script>

<!-- DataTables Select JS -->
<script type="text/javascript" src="../../js/addons/datatables-select.min.js"></script>

<script>

    $(document).ready(function () {
        $('#po_new').DataTable();
        $('#po_purchased').DataTable();
        $('#po_recorded').DataTable();
    });

</script>

</body>

</html>
