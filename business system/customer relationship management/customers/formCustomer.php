<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>New Customer</title>

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
                    <h1 class="display-4">Customer Form</h1>
                    <p class="lead">Please fill out all fields below.</p>
                    <p class="lead">* = required</p>
                </div>
            </div>
            <form action="newCustomerEntry.php" method="POST" >
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
                    <label for="companyName">Company Name</label>
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
                            id="inputEmail4"
                            placeholder="Email"
                            name="email"
                            required="true"
                    />
                </div>
                <div class="form-row col-md-6" align="left">
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
                <div class="form-group col-md-6" align="left">
                    <label>Are you currently enrolled at SIUE? If you are and you dont have your id on you, please bring ID upon pick up.</label>
                </div>
                <div class="form-group col-md-6" align="left">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="studentStatus" id="inSchool" value="yes" onclick="show(0)">
                        <label class="form-check-label" for="inSchool">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="studentStatus" id="inputPANo" value="no" checked onclick="show(1)">
                        <label class="form-check-label" for="inputPANo">No </label>
                    </div>
                </div>

                <script>

                    function show(x){

                        if(x==0){
                            document.getElementById("start").style.display = 'block';
                        }

                        else document.getElementById("start").style.display = 'none';
                        return;
                    }

                </script>

                <div style="display:none;"  id="start" class="form-group col-md-6" align="left">
                    <label for="gradDate">When are you expecting to graduate? <span style="color: red"></span>*</label>

                    <input
                            type="date"
                            name="gradDate"
                            value=""
                            min="2019-01-01"
                            max="2030-12-31"
                            class ="student"
                    >

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
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit & Create Ticket" />
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
