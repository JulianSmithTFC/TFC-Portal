<?php

include '../../config.php';

// Get the customer ID.
$leadID = intval($_GET['id']);



if (isset($_POST['delete'])) {

    $message = "Lead with ID of " . $leadID . " has been deleted";
    echo "<script type='text/javascript'>alert('$message');</script>";


    $sql = "DELETE FROM leads WHERE leadID = '$leadID'";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die($conn->error);
    }

    $stmt->execute();

    if ($stmt->error) {
        die($stmt->error);
    }

    $result = $conn->query("SELECT * FROM leads WHERE leadID = {$leadID}") or die($conn->error);
    $customerID = $result->fetch_assoc();

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Delete Lead</title>

    <!-- Google Firebase Auth -->
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-auth.js"></script>

    <script type="text/javascript" src="../../../js/login business portal/config.js"></script>

    <script type="text/javascript" src="../../../js/login business portal/enforcer.js"></script>

    <?php
    include '../../../libraries/includes-header.php';
    ?>

</head>

<body class="grey lighten-3">

<?php include '../../../templet parts/bp-mainNavigation.php'; ?>

<!--Main layout-->
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

        <!-- Main Content Goes Here -->
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Are you sure you want to delete this lead?</h1>
                <p class="lead">click to delete this lead</p>

                <form method="post">
                    <button name="delete" type="submit" class="btn btn-primary">
                        Delete Now!
                    </button>
                </form>
            </div>
        </div>
        <div>
            <a href="dashboardLead.php" role="button" class="btn btn-primary
            btn-lg btn-block">Back to Lead Dashboard</a>
        </div>
        <br/>
        <div>
            <a href="formLead.php" role="button" class="btn btn-primary btn-lg
            btn-block">Create Another Lead</a>
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


</body>

</html>
