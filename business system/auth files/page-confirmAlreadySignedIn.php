<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Already Signed In</title>

    <!-- Google Firebase Auth -->
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-auth.js"></script>

    <script type="text/javascript" src="../../js/login business portal/config.js"></script>

    <?php
    include '../../libraries/includes-header.php';
    ?>

    <script>
        firebase.auth().onAuthStateChanged(function(user) {
            if (user == null) {
                window.location.replace("http://tfcportal.com/tfcuser.php");
            }
            user.providerData.forEach(function (profile) {

                let email = profile.email;

                document.querySelector("#message").innerHTML = ("You are currently signed in as <span style='color: deepskyblue'>" + email + "</span>, which already has an TFCPortal account");

            });
        });
    </script>


</head>
<body>

<div class="container-fluid">
    <div class="container">
        <br/>
        <div class="border border-light p-5" align="center">

            <p id="message"></p>

            <button class="btn btn-info my-4 btn-block" type="submit" onclick="proceed()">Continue With Current Account</button>


            <button class="btn btn-info my-4 btn-block" type="submit" onclick="signout()">Use Another Account</button>


        </div>


    </div>
</div>

<?php
include '../../libraries/includes-footer.php';
?>

<script>
    function signout() {
        firebase.auth().signOut().then(function() {
            // Sign-out successful.

        }).catch(function(error) {
            // An error happened.
        });
    }

    function proceed() {
        firebase.auth().onAuthStateChanged(function(user) {
            user.providerData.forEach(function (profile) {

                /*
                let uid = profile.uid;
                let name = profile.displayName;
                let email = profile.email;

                window.location.replace("https://tfcportal.com/converter.php?uid=" + uid + "&name=" + name + "&email=" + email);
                */
                window.location.replace("https://tfcportal.com/business%20system/page-dashboard.php");
            });
        });
    }
</script>

</body>
</html>