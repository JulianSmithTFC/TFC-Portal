<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>

    <!-- Google Firebase Auth -->
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-auth.js"></script>

    <script type="text/javascript" src="../../js/login client portal/config.js"></script>

    <?php
    include '../../libraries/includes-header.php';
    ?>

</head>
<body>

<div class="container-fluid">
    <div class="container" align="center">
        <br/>
        <form class="border border-light p-5">

            <p class="h4 mb-4 text-center">Reset Password</p>
            <label id="errorAlert" for="Email"></label>
            <input type="email" id="Email" name="Email" class="form-control mb-4" placeholder="E-mail" onclick="clearErrorAlert()">


        </form>

        <button class="btn btn-info my-4 btn-block" type="submit" onclick="resetPassword()">Reset Password</button>
        <p>If you still need help, contact <a href="">Tech Fusion Support.</a></p>
    </div>
</div>

<?php
include '../../libraries/includes-footer.php';
?>

<script>
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            window.location.replace("page-confirmAlreadySignedIn.php");
        } else {
            console.log("Not Signed In");
        }
    });


    function resetPassword() {
        var auth = firebase.auth();
        var emailAddress = document.querySelector("#Email").value;

        auth.sendPasswordResetEmail(emailAddress).then(function() {
            // Email sent.
            alert('\nPassword Reset Sussessful!\n\nPlease check the Email Address associated with your account for a reset email. If you dont get it withing 24 hours please contact customer support.');
            window.location.replace("http://tfcportal.com");
        }).catch(function(error) {

            var errorCode = error.code;
            var errorMessage = error.message;

            if (errorCode === 'auth/invalid-email'){
                //Thrown if the email address is not valid.
                document.querySelector("#errorAlert").innerHTML = "The Email Address You Entered is not Valid";
                document.querySelector("#Email").value = "";
            }
            else if (errorCode === 'auth/user-not-found'){
                //Thrown if there is no user corresponding to the email address.
                document.querySelector("#errorAlert").innerHTML = "There is no User Associated With the Email Address you Entered";
                document.querySelector("#Email").value = "";
            }
            else {
                alert(errorMessage);
            }
            console.log(error);
        });
    }

    function clearErrorAlert() {
        document.querySelector("#errorAlert").innerHTML = "";
    }


</script>

</body>
</html>