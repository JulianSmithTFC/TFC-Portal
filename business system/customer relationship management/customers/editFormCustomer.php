<?php


include '../../config.php';

// Get the customer ID.
$customerId = intval($_GET['id']);

// If form was submitted, update the customer.
if (!empty($_POST['customerID'])) {

    $customerUpdated = true;

    $sql = "UPDATE customers
        SET
            fname = ?,
            lname = ?,
            companyName = ?,
            email = ?,
            businessPhone = ?,
            businessPhoneExt = ?,
            cellPhone = ?,
            studentStatus = ?,
            gradDate = ?,
            howDidYouHear = ?
        WHERE customerID = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die($conn->error);
    }

    $stmt->bind_param(
        'ssssssssssi',
        $_POST['fname'],
        $_POST['lname'],
        $_POST['companyName'],
        $_POST['email'],
        $_POST['businessPhone'],
        $_POST['businessPhoneExt'],
        $_POST['cellPhone'],
        $_POST['studentStatus'],
        date("Y-m-d", strtotime($_POST['gradDate'])),
        $_POST['howDidYouHear'],
        $_POST['customerID']
    );

    $stmt->execute();

    if ($stmt->error) {
        die($stmt->error);
    }

    $stmt->close();
}

// Load the customer.
$result = $conn->query("SELECT * FROM customers WHERE customerID = {$customerId}") or die($conn->error);
$customer = $result->fetch_assoc();

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Customer Info</title>

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
        <div align="center">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Edit Customer Form</h1>
                    <p class="lead">You are editing a current customer </p>
                    <?php if ($customerUpdated) : ?>
                        <div class="alert alert-success">Customer updated.</div>
                    <?php endif; ?>
                </div>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group col-md-6" align="left">
                    <label for="companyName">Customer Uid</label>
                    <input
                            type="text"
                            class="form-control"
                            id="uid"
                            placeholder="Company Name"
                            name="uid"
                            value="<?= $customer['uid'] ?>"
                            disabled
                    />
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="fname">*First Name</label>
                        <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" value="<?= $customer['fname'] ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lname">*Last Name</label>
                        <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" value="<?= $customer['lname'] ?>" />
                    </div>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="companyName">Company Name</label>
                    <input type="text" class="form-control" id="companyName" placeholder="Company Name" name="companyName" value="<?= $customer['companyName'] ?>" />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="email">*Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= $customer['email'] ?>" />
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="businessPhone">Business Phone</label>
                        <input type="tel" class="form-control" id="businessPhone" placeholder="Phone Number" name="businessPhone" value="<?= $customer['businessPhone'] ?>" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="businessPhoneExt">EXT</label>
                        <input type="text" class="form-control" id="businessPhoneExt" name="businessPhoneExt" value="<?= $customer['businessPhoneExt'] ?>" />
                    </div>
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="cellPhone">*Cell Phone</label>
                        <input type="tel" class="form-control" id="cellPhone" placeholder="Phone Number" name="cellPhone" value="<?= $customer['cellPhone'] ?>" />
                    </div>
                </div>
                <div class="form-group col-md-6" align="left">
                    <p>Student Status and Graduation Date</p>
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-4">
                        <label for="studentStatus">Student Stats</label>
                        <input readonly type="text" class="form-control" id="studentStatus" name="studentStatus" value="<?= $customer['studentStatus'] ?>" />
                    </div>

                    <div class="form-group col-md-4">
                        <label for="gradDate">Grad Date: year/month/day</label>
                        <input readonly type="text" class="form-control" id="gradDate" name="gradDate" value="<?= $customer['gradDate'] ?>" />
                    </div>
                </div>

                <script>
                    function show(x) {

                        if (x == 0) {
                            document.getElementById("start").style.display = 'block';
                        } else document.getElementById("start").style.display = 'none';
                        return;
                    }
                </script>

                <div style="display:none;" id="start" class="form-group col-md-6" align="left">
                    <label for="gradDate">When are you expecting to graduate?*</label>

                    <input type="date" name="gradDate" value="" min="2019-01-01" max="2030-12-31" class="student">

                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="howDidYouHear">How did you hear about us?</label>
                    <select id="howDidYouHear" class="form-control" name="howDidYouHear">
                        <option selected value="<?= $customer['howDidYouHear'] ?>"><?= $customer['howDidYouHear'] ?></option>
                        <option value="Facebook">Facebook</option>
                        <option value="Google">Google</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Twitter">Twitter</option>
                        <option value="Youtube">Youtube</option>
                        <option value="Business Card">Business Card</option>
                        <option value="Walk-in">Walk-in</option>
                        <option value="ITS SIUE">ITS SIUE</option>
                        <option value="Web Search">Web Search</option>
                        <option value="Tech Fusion Website">Tech Fusion Website</option>
                        <option value="Contact Form (Tech Fusion Website)">Contact Form (Tech Fusion Website)</option>
                        <option value="Referral">Referral</option>
                        <option value="Event">Event</option>
                        <option value="Email">Email</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div>
                    <br>
                    <input type="hidden" name="customerID" value="<?= $customerId ?>">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>

            </form>

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
