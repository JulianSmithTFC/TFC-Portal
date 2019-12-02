<?php

include '../../config.php';

$queryTable = "SELECT * FROM leads ORDER BY leadID DESC";
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

        <div class="table-responsive">
            <h3>Leads & Prospects</h3>
            <table id="client_data" data-order='[[ 0, "desc" ]]' data-page-length='5' class="table table-striped">
                <thead>
                <tr>
                    <td>Database ID</td>
                    <td>UID</td>
                    <td>Name</td>
                    <td>Company Name</td>
                    <td>Email</td>
                    <td>Lead Rating</td>
                    <td>Edit or Delete</td>
                </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_array($resultTable)) {
                    ?>

                    <tr>
                        <td><?php echo $row["leadID"] ?></td>
                        <td><?php echo $row["uid"] ?></td>
                        <td><?php echo ($row["fname"] . ' ' . $row["lname"]) ?></td>
                        <td><?php echo $row["companyName"] ?></td>
                        <td><?php echo $row["email"]  ?></td>
                        <td><?php echo $row["leadRating"]?></td>
                        <td>
                            <a href="editFormLead.php?id=<?php echo $row["leadID"] ?>">
                                <button type="button" class="btn btn-sm btn-primary btn-rounded">Edit <i class="fas fa-edit fa-lg"></i></button>
                            </a>
                            <a href="deleteLeadEntry.php?id=<?php echo $row["leadID"] ?>" >
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
        $('#client_data').DataTable();
    });

</script>



</body>

</html>
