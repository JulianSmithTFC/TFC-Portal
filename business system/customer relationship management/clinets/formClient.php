<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>New Client</title>

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
                    <h1 class="display-4">Client Form</h1>
                    <p class="lead">Please fill out all fields below.</p>
                    <p class="lead">* = required</p>
                </div>
            </div>
            <form action="newClientEntry.php" method="POST" >
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-6">
                        <label for="fname">*First Name <span style="color: red"></span></label>
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
                        <label for="lname">*Last Name <span style="color: red"></span></label>
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
                    <label for="email">*Email <span style="color: red"></span></label>
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
                            <label for="cellPhone">*Cell Phone <span style="color: red"></span></label>
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
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-12" align="left">
                        <label for="faxNumber">Fax Number</label>
                        <input
                                type="tel"
                                class="form-control"
                                id="faxNumber"
                                placeholder="Fax Number"
                                name="faxNumber"
                        />
                    </div>
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-12" align="left">
                        <label for="addressLine">*Address <span style="color: red"></span></label>
                        <input
                                type="text"
                                class="form-control"
                                id="addressLine"
                                placeholder="1234 Main St"
                                name="addressLine"
                        />
                    </div>
                </div>
                <div class="form-row col-md-6" align="left">
                    <div class="form-group col-md-4">
                        <label for="addressCity">*City <span style="color: red"></span></label>
                        <input
                                type="text"
                                class="form-control"
                                id="addressCity"
                                placeholder="city"
                                name="addressCity"
                        />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="addressState">*State <span style="color: red"></span></label>
                        <select id="addressState" class="form-control" name="addressState">
                            <option selected>Select state</option>
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
                        <label for="addressZipCode">*Zip <span style="color: red"></span></label>
                        <input
                                type="text"
                                class="form-control"
                                id="addressZipCode"
                                name="addressZipCode"
                        />
                    </div>
                </div>
                <div class="form-group col-md-6" align="left">
                    <label for="howDidYouHear">How did you hear about us? <span style="color: red"></span></label>
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
