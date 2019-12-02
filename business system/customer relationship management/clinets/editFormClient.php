<?php


include '../../config.php';

// Get the client ID.
$clientId = intval($_GET['id']);

// If form was submitted, update the client.
if (!empty($_POST['clientID'])) {

    $clientUpdated = true;

    $sql = "UPDATE clients
        SET
            fname = ?,
            lname = ?,
            companyName = ?,
            email = ?,
            businessPhone = ?,
            businessPhoneExt = ?,
            cellPhone = ?,
            faxNumber = ?,
            addressLine = ?,
            addressCity = ?,
            addressState = ?,
            addressZipCode = ?,
            howDidYouHear = ?
        WHERE clientID = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die($conn->error);
    }

    $stmt->bind_param(
        'sssssssssssssi',
        $_POST['fname'],
        $_POST['lname'],
        $_POST['companyName'],
        $_POST['email'],
        $_POST['businessPhone'],
        $_POST['businessPhoneExt'],
        $_POST['cellPhone'],
        $_POST['faxNumber'],
        $_POST['addressLine'],
        $_POST['addressCity'],
        $_POST['addressState'],
        $_POST['addressZipCode'],
        $_POST['howDidYouHear'],
        $_POST['clientID']
    );

    $stmt->execute();

    if ($stmt->error) {
        die($stmt->error);
    }

    $stmt->close();

}

// Load the client.
$result = $conn->query("SELECT * FROM clients WHERE clientID = {$clientId}") or die($conn->error);
$client = $result->fetch_assoc();

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Client Info</title>

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
                    <p class="lead">You are editing a current client </p>
                    <?php if ($clientUpdated) : ?>
                        <div class="alert alert-success">Customer updated.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div align="center">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group col-md-6" align="left">
                    <label for="companyName">Client Uid</label>
                    <input
                            type="text"
                            class="form-control"
                            id="uid"
                            placeholder="Company Name"
                            name="uid"
                            value="<?= $client['uid'] ?>"
                            disabled
                    />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="companyName">Client System Creation Link</label>
                    <input
                            type="text"
                            class="form-control"
                            id="clientCreationLink"
                            placeholder="Company Name"
                            name="clientCreationLink"
                            value="<?php echo ('https://tfcportal.com/client%20system/form-newUser.php?uid=' . $client['uid'])?>"
                            disabled
                    />
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="fname">*First Name</label>
                        <input
                                type="text"
                                class="form-control"
                                id="fname"
                                placeholder="First Name"
                                name="fname"
                                value="<?= $client['fname'] ?>"
                                required="true"
                        />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lname">*Last Name</label>
                        <input
                                type="text"
                                class="form-control"
                                id="lname"
                                placeholder="Last Name"
                                name="lname"
                                value="<?= $client['lname'] ?>"
                                required="true"
                        />
                    </div>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="companyName">*Company Name</label>
                    <input
                            type="text"
                            class="form-control"
                            id="companyName"
                            placeholder="Company Name"
                            name="companyName"
                            value="<?= $client['companyName'] ?>"
                    />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="email">*Email</label>
                    <input
                            type="email"
                            class="form-control"
                            id="email"
                            placeholder="Email"
                            name="email"
                            value="<?= $client['email'] ?>"
                            required="true"
                    />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="cellPhone">*Cell Phone</label>
                    <input type="tel" class="form-control" id="cellPhone" placeholder="Phone Number" name="cellPhone" value="<?= $client['cellPhone'] ?>" />
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="businessPhone">Business Phone</label>
                        <input type="tel" class="form-control" id="businessPhone" placeholder="Phone Number" name="businessPhone" value="<?= $client['businessPhone'] ?>" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="businessPhoneExt">EXT</label>
                        <input type="text" class="form-control" id="businessPhoneExt" name="businessPhoneExt" value="<?= $client['businessPhoneExt'] ?>" />
                    </div>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="faxNumber">Fax Number</label>
                    <input type="tel" class="form-control" id="faxNumber" placeholder="Fax Number" name="faxNumber" value="<?= $client['faxNumber'] ?>" />
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="addressLine">*Address</label>
                    <input type="text" class="form-control" id="addressLine" placeholder="1234 Main St" name="addressLine" value="<?= $client['addressLine'] ?>" />
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="addressCity">*City</label>
                        <input type="text" class="form-control" id="addressCity" placeholder="city" name="addressCity" value="<?= $client['addressCity'] ?>" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="addressState">*State</label>
                        <select id="addressState" class="form-control" name="addressState">
                            <option selected value="<?= $client['addressState'] ?>"><?= $client['addressState'] ?></option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="addressZipCode">*Zip</label>
                        <input type="text" class="form-control" id="addressZipCode" name="addressZipCode" value="<?= $client['addressZipCode'] ?>" />
                    </div>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="howDidYouHear">How did you hear about us?</label>
                    <select id="howDidYouHear" class="form-control" name="howDidYouHear">
                        <option selected value="<?= $client['howDidYouHear'] ?>"><?= $client['howDidYouHear'] ?></option>
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

                <br>
                <input type="hidden" id="clientID" name="clientID" value="<?= $clientId ?>">

                <button type="submit" name="submit" class="btn btn-primary">Update</button>

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
require '../../../libraries/includes-footer.php';
?>

</body>

</html>