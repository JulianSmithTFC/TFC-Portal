<?php

include '../config.php';

$query = "SELECT * FROM quotes ORDER BY quoteID DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Quote Dashboard</title>

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
                <table id="quote_data" data-order='[[ 0, "desc" ]]' class="table table-striped">
                    <thead>
                    <tr>
                        <td>Quote #</td>
                        <td>Status</td>
                        <td>Customer/Client Uid</td>
                        <td>Client Name</td>
                        <td>Sales Rep</td>
                        <td>Tax</td>
                        <td>Profit</td>
                        <td>Total</td>
                        <td>Print, Edit, & Delete</td>
                    </tr>
                    </thead>
                    <?php
                    setlocale(LC_MONETARY, 'en_US.UTF-8');
                    while ($row = mysqli_fetch_array($result)) {

                        $uid = $row['uid'];

                        $resultCustomer = $conn->query("SELECT * FROM customers WHERE uid = ('$uid')") or die($conn->error);
                        $customer = $resultCustomer->fetch_assoc();

                        $resultLead = $conn->query("SELECT * FROM leads WHERE uid = ('$uid')") or die($conn->error);
                        $lead = $resultLead->fetch_assoc();

                        $resultClient = $conn->query("SELECT * FROM clients WHERE uid = ('$uid')") or die($conn->error);
                        $client = $resultClient->fetch_assoc();

                        if($customer != null){
                            $accountHolderName = ($customer['fname'] . ' '. $customer['lname']);
                        }
                        else if($lead != null){
                            $accountHolderName = ($lead['fname'] . ' '. $lead['lname']);
                        }
                        else if($client != null){
                            $accountHolderName = ($client['fname'] . ' '. $client['lname']);
                        }

                        ?>
                        <tr>
                            <td><?php echo $row["quoteID"] ?></td>
                            <td><?php echo $row["quoteStatus"] ?></td>
                            <td><?php echo $row["uid"] ?></td>
                            <td><?php echo $accountHolderName ?></td>
                            <td><?php echo $row["salesRep"] ?></td>
                            <td><?php
                                $quoteTaxTotal = $row["quoteTaxTotal"];
                                $formatedQuoteTaxTotal = money_format('%.2n', $quoteTaxTotal);
                                echo $formatedQuoteTaxTotal ?>
                            </td>
                            <td><?php
                                $quoteProfitTotal =  $row["quoteProfitTotal"];
                                $formatedQuoteProfitTotal = money_format('%.2n', $quoteProfitTotal);
                                echo $formatedQuoteProfitTotal ?>
                            </td>
                            <td><?php
                                $quoteTotal =  $row["quoteTotal"];
                                $formatedQuoteTotal = money_format('%.2n', $quoteTotal);
                                echo $formatedQuoteTotal ?>
                            </td>
                            <td>
                                <a href ="generateDetailedPDF.php?id=<?php echo $row["quoteID"] ?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Detailed PDF    <i class="fas fa-file-pdf fa-lg"></i></button>
                                </a>

                                <a href ="generatePDF.php?id=<?php echo $row["quoteID"] ?>" target="_blank">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Simple PDF    <i class="fas fa-file-pdf fa-lg"></i></button>
                                </a>

                                <a href ="editFormQuote.php?id=<?php echo $row["quoteID"] ?>">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Edit  <i class="fas fa-edit fa-lg"></i></button>
                                </a>
                                <a href ="deleteQuoteEntry.php?id=<?php echo $row["quoteID"] ?>">
                                    <button type="button" class="btn btn-sm btn-primary btn-rounded">Delete    <i class="fas fa-trash fa-lg"></i></button>
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
        $('#quote_data').DataTable();

    });

</script>

</body>

</html>


