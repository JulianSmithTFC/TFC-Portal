<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- Google Firebase Auth -->
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-auth.js"></script>

    <script type="text/javascript" src="js/login business portal/config.js"></script>

    <?php
    include 'libraries/includes-header.php';
    ?>

</head>
<body>

<br/>
<br/>

<div class="container-fluid">
    <div class="container">
        <form class="border border-light p-5">

            <p class="h4 mb-4 text-center">Sign in</p>

            <label for="Email" id="emailErrorAlert"></label>
            <input type="email" id="Email" name="Email" class="form-control mb-4" placeholder="E-mail" onclick="clearEmailErrorAlert()">

            <label for="Password" id="passwordErrorAlert"></label>
            <input type="password" id="Password" name="Password" class="form-control mb-4" placeholder="Password" onclick="clearPasswordErrorAlert()">

        </form>

        <button class="btn btn-info btn-block my-4" type="" onclick="signin()">Sign in</button>

        <a href="business%20system/auth%20files/page-passReset.php">
            <button class="btn btn-info btn-block my-4" type="">Forgot password?</button>
        </a>


    </div>
</div>


<?php
include 'libraries/includes-footer.php';
?>

<script>

    var auth = firebase.auth();

    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            window.location.replace("business%20system/auth%20files/page-confirmAlreadySignedIn.php");
        } else {
            console.log("Not Signed In");
        }
    });

    //SignIn Function
    function signin() {

        const email = document.querySelector("#Email").value;
        const password = document.querySelector("#Password").value;

        auth.signInWithEmailAndPassword( email, password).then(function() {
            // Email sent.
        }).catch(function(error) {

            var errorCode = error.code;
            var errorMessage = error.message;

            if (errorCode === 'auth/invalid-email') {
                //Thrown if the email address is not valid.
                document.querySelector("#emailErrorAlert").innerHTML = "The Email Address you Entered is not Valid";
                document.querySelector("#Email").value = "";
            }
            else if (errorCode === 'auth/user-disabled'){
                //Thrown if the user corresponding to the given email has been disabled.
                document.querySelector("#emailErrorAlert").innerHTML = "The Account Associated With the Email Address you Entered is Disabled";
                document.querySelector("#Email").value = "";
            }
            else if (errorCode === 'auth/user-not-found'){
                //Thrown if there is no user corresponding to the given email.
                document.querySelector("#emailErrorAlert").innerHTML = "There is no Account Associated to The Email Address you Entered";
                document.querySelector("#Email").value = "";
            }
            else if (errorCode === 'auth/wrong-password'){
                //Thrown if the password is invalid for the given email, or the account corresponding to the email does not have a password set.
                document.querySelector("#passwordErrorAlert").innerHTML = "The Password you have Entered is Incorrect";
                document.querySelector("#Password").value = "";
            }
            else {
                alert(errorMessage);
            }
            console.log(error);
        });

    }


    function clearEmailErrorAlert() {
        document.querySelector("#emailErrorAlert").innerHTML = "";
    }

    function clearPasswordErrorAlert() {
        document.querySelector("#passwordErrorAlert").innerHTML = "";
    }







</script>

</body>
</html>