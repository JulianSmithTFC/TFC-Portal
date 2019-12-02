<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>New Lead</title>

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
                    <h1 class="display-4">Lead & Prospect Form</h1>
                    <p class="lead">Please fill out all fields below.</p>
                    <p class="lead">* = required</p>
                </div>
            </div>
            <form action="newLeadEntry.php" method="POST" >
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="fname">*First Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="fname"
                            placeholder="First Name"
                            name="fname"
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
                        required="true"
                    />
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-row col-md-6" align="left">
                        <div class="form-group col-md-6">
                            <label for="cellPhone">*Cell Phone</label>
                            <input
                                type="tel"
                                class="form-control"
                                id="cellPhone"
                                placeholder="Phone Number"
                                name="cellPhone"
                            />
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="businessPhone">Business Phone</label>
                        <input
                            type="tel"
                            class="form-control"
                            id="businessPhone"
                            placeholder="Phone Number"
                            name="businessPhone"
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="businessPhoneExt">EXT</label>
                        <input
                            type="text"
                            class="form-control"
                            id="businessPhoneExt"
                            name="businessPhoneExt"
                        />
                    </div>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="howDidYouHear">How did you hear about us?</label>
                    <select id="howDidYouHear" class="form-control" name="howDidYouHear">
                        <option selected>Word of mouth</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Google">Google</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Twitter">Twitter</option>
                        <option value="Youtube">Youtube</option>
                        <option value="Business">Business Card</option>
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
                    <label for="leadSource">Lead Source</label>
                    <select id="leadSource" class="form-control" name="leadSource">
                        <option value="Web">Web</option>
                        <option value="Phone Inquiry">Phone Inquiry</option>
                        <option value="Partner Referral">Partner Referral</option>
                        <option value="Purchased List">Purchased List</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="leadStatus">Lead Status</label>
                    <select id="leadStatus" class="form-control" name="leadStatus">
                        <option value="Open - Not Contacted">Open - Not Contacted</option>
                        <option value="Working = Contacted">Working = Contacted</option>
                        <option value="Closed - Converted">Closed - Converted</option>
                        <option value="Closed - Not Converted">Closed - Not Converted</option>
                    </select>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="leadRating">Lead Rating</label>
                    <select id="leadRating" class="form-control" name="leadRating">
                        <option value="Hot">Hot</option>
                        <option value="Warm">Warm</option>
                        <option value="Cold">Cold</option>
                    </select>
                </div>

                <div class="form-group col-md-6" align="left">
                    <label for="leadServiceIntrest">Lead Service Interest</label>
                    <select id="leadServiceIntrest" class="form-control" name="leadServiceIntrest">
                        <option value="Website Redesign">Website Redesign</option>
                        <option value="New Website">New Website</option>
                        <option value="Managed Services">Managed Services</option>
                        <option value="New Website">New Website</option>
                        <option value="Security Camera Installation">Security Camera Installation</option>
                        <option value="Update">Update</option>
                    </select>
                </div>

                <div class="form-group col-md-6" align="left">
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
                </div>

                <br/>
                <br/>

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
