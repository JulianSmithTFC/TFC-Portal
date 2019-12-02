<?php


include '../../config.php';

// Get the customer ID.
$leadID = intval($_GET['id']);

// If form was submitted, update the customer.
if (!empty($_POST['leadID'])) {

    $leadUpdated = true;

    $sql = "UPDATE leads
        SET
            fname = ?,
            lname = ?,
            companyName = ?,
            email = ?,
            businessPhone = ?,
            businessPhoneExt = ?,
            cellPhone = ?,
            howDidYouHear = ?,
            leadRating = ?,
            leadServiceIntrest = ?,
            leadSource = ?,
            leadStatus = ?
        WHERE leadID = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die($conn->error);
    }

    $stmt->bind_param(
        'ssssssssssssi',
        $_POST['fname'],
        $_POST['lname'],
        $_POST['companyName'],
        $_POST['email'],
        $_POST['businessPhone'],
        $_POST['businessPhoneExt'],
        $_POST['cellPhone'],
        $_POST['howDidYouHear'],
        $_POST['leadRating'],
        $_POST['leadServiceIntrest'],
        $_POST['leadSource'],
        $_POST['leadStatus'],
        $_POST['leadID']
    );

    $stmt->execute();

    if ($stmt->error) {
        die($stmt->error);
    }

    $stmt->close();
}

// Load the customer.
$result = $conn->query("SELECT * FROM leads WHERE leadID = {$leadID}") or die($conn->error);
$lead = $result->fetch_assoc();

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Lead Info</title>

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
                    <h1 class="display-4">Edit Lead Form</h1>
                    <p class="lead">You are editing a current lead </p>
                    <?php if ($leadUpdated) : ?>
                        <div class="alert alert-success">Lead updated.</div>
                    <?php endif; ?>
                </div>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group col-md-6" align="left">
                    <label for="companyName">Lead Uid</label>
                    <input
                            type="text"
                            class="form-control"
                            id="uid"
                            placeholder="Company Name"
                            name="uid"
                            value="<?= $lead['uid'] ?>"
                            disabled
                    />
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="fname">*First Name</label>
                        <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" value="<?= $lead['fname'] ?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lname">*Last Name</label>
                        <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" value="<?= $lead['lname'] ?>" />
                    </div>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="companyName">Company Name</label>
                    <input type="text" class="form-control" id="companyName" placeholder="Company Name" name="companyName" value="<?= $lead['companyName'] ?>" />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="email">*Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= $lead['email'] ?>" />
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="cellPhone">*Cell Phone</label>
                        <input type="tel" class="form-control" id="cellPhone" placeholder="Phone Number" name="cellPhone" value="<?= $lead['cellPhone'] ?>" />
                    </div>
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="businessPhone">Business Phone</label>
                        <input type="tel" class="form-control" id="businessPhone" placeholder="Phone Number" name="businessPhone" value="<?= $lead['businessPhone'] ?>" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="businessPhoneExt">EXT</label>
                        <input type="text" class="form-control" id="businessPhoneExt" name="businessPhoneExt" value="<?= $lead['businessPhoneExt'] ?>" />
                    </div>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="howDidYouHear">How did you hear about us?</label>
                    <select id="howDidYouHear" class="form-control" name="howDidYouHear">
                        <option selected value="<?= $lead['howDidYouHear'] ?>"><?= $lead['howDidYouHear'] ?></option>
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
                <div class="form-group col-md-6" align="left">
                    <label for="inputHowDidYouHear">Lead Source</label>
                    <select id="inputHowDidYouHear" class="form-control" name="leadSource">
                        <option selected value="<?= $lead['leadSource'] ?>"><?= $lead['leadSource'] ?></option>
                        <option value="Web">Web</option>
                        <option value="Phone Inquiry">Phone Inquiry</option>
                        <option value="Partner Referral">Partner Referral</option>
                        <option value="Purchased List">Purchased List</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="inputHowDidYouHear">Lead Status</label>
                    <select id="inputHowDidYouHear" class="form-control" name="leadStatus">
                        <option selected value="<?= $lead['leadStatus'] ?>"><?= $lead['leadStatus'] ?></option>
                        <option value="Open - Not Contacted">Open - Not Contacted</option>
                        <option value="Working = Contacted">Working = Contacted</option>
                        <option value="Closed - Converted">Closed - Converted</option>
                        <option value="Closed - Not Converted">Closed - Not Converted</option>
                    </select>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="inputHowDidYouHear">Lead Rating</label>
                    <select id="inputHowDidYouHear" class="form-control" name="leadRating">
                        <option selected value="<?= $lead['leadRating'] ?>"><?= $lead['leadRating'] ?></option>
                        <option value="Hot">Hot</option>
                        <option value="Warm">Warm</option>
                        <option value="Cold">Cold</option>
                    </select>
                </div>

                <div class="form-group col-md-6" align="left">
                    <label for="inputHowDidYouHear">Lead Service Interest</label>
                    <select id="inputHowDidYouHear" class="form-control" name="leadServiceIntrest">
                        <option selected value="<?= $lead['leadServiceIntrest'] ?>"><?= $lead['leadServiceIntrest'] ?></option>
                        <option value="Website Redesign">Website Redesign</option>
                        <option value="New Website">New Website</option>
                        <option value="Managed Services">Managed Services</option>
                        <option value="New Website">New Website</option>
                        <option value="Security Camera Installation">Security Camera Installation</option>
                        <option value="Update">Update</option>
                    </select>
                </div>
                <div>
                    <br>
                    <input type="hidden" name="leadID" value="<?= $leadID ?>">
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