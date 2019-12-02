<?php
$uid = $_GET["uid"];

if ($uid != ''){

    include '../business system/config.php';
    $result = $conn->query("SELECT * FROM clients WHERE uid = '$uid'");
    $client = $result->fetch_assoc();
    $conn->close();

    $uid = $client['uid'];
    $fname = $client['fname'];
    $lname = $client['lname'];
    $email = $client['email'];
}
else{
    header("Location: https://tfcportal.com");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SignUp For Portal Account</title>

    <!-- Google Firebase Auth -->
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-auth.js"></script>

    <script type="text/javascript" src="../js/login client portal/config.js"></script>

    <?php
    include '../libraries/includes-header.php';
    ?>

</head>
<body>

<div class="container-fluid">
    <div class="container">
        <br/>
        <form class="border border-light p-5">

            <p class="h4 mb-4 text-center">Sign up</p>

            <label for="fname" id="fnameErrorAlert"></label>
            <input type="text" id="fname" name="fname" class="form-control mb-4" placeholder="First name" value="<?php echo $fname ?>" onclick="clearNameErrorAlert()">

            <label for="lname" id="lnameErrorAlert"></label>
            <input type="text" id="lname" name="lname" class="form-control mb-4" placeholder="Last name" value="<?php echo $lname ?>" onclick="clearNameErrorAlert()">

            <label for="email" id="emailErrorAlert"></label>
            <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail" value="<?php echo $email ?>" onclick="clearEmailErrorAlert()">

            <label for="password" id="passwordErrorAlert"></label>
            <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password" onclick="clearPasswordErrorAlert()">

            <label for="confirmPassword" id="passwordConfirmErrorAlert"></label>
            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control mb-4" placeholder="Confirm Password" onclick="clearPasswordErrorAlert()">

            <label for="uid"></label>
            <input type="text" id="uid" name="uid" class="form-control mb-4" placeholder="uid" value="<?php echo $uid ?>" disabled>


            <div class="cusstom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
                <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
            </div>



            <div class="text-center">

                <p>By clicking
                    <em>Sign up</em> you agree to our
                    <a href="" target="_blank">Terms of Service</a> and
                    <a href="" target="_blank">Privacy Policy</a>.
                </p>
            </div>
        </form>

        <button class="btn btn-info my-4 btn-block" type="submit" onclick="signup()">Sign up</button>
    </div>
</div>

<?php
include '../libraries/includes-footer.php';
?>

<script>

    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            window.location.replace("https://tfcportal.com/client%20system/auth%20files/page-confirm.php");
        }
    });

    //Signup Function
    function signup() {

        var auth = firebase.auth();

        let fname = document.querySelector("#fname").value;
        let lname = document.querySelector("#lname").value;
        let name = (fname + ' ' +  lname);
        let email = document.querySelector("#email").value;
        let password = document.querySelector("#password").value;
        let passwordConfirm = document.querySelector("#confirmPassword").value;
        let uid = document.querySelector("#uid").value;

        if ((fname != "") && (lname != "")){
            if (password === passwordConfirm){

                auth.createUserWithEmailAndPassword( email, password).then(function() {

                    var user = firebase.auth().currentUser;

                    user.updateProfile({
                        displayName: name,
                        photoURL: uid
                    }).then(function() {
                        // Update successful.
                    }).catch(function(error) {
                        // An error happened.
                    });

                    /**
                     * Sends an email verification to the user.
                     */
                    function sendEmailVerification() {
                        // [START sendemailverification]
                        firebase.auth().currentUser.sendEmailVerification().then(function() {
                            // Email Verification sent!
                            // [START_EXCLUDE]
                            alert('Email Verification Sent!');
                            // [END_EXCLUDE]
                        });
                        // [END sendemailverification]
                    }

                }).catch(function(error) {
                    // Handle Errors here.

                    var errorCode = error.code;
                    var errorMessage = error.message;

                    if (errorCode === 'auth/email-already-in-use'){
                        //Thrown if there already exists an account with the given email address.
                        document.querySelector("#emailErrorAlert").innerHTML = "The Email Address You Have Entered already Belongs to Another User";
                    }
                    else if (errorCode === 'auth/invalid-email'){
                        //Thrown if the email address is not valid.
                        document.querySelector("#emailErrorAlert").innerHTML = "The Email Address You Entered is not Valid";
                    }
                    else if (errorCode === 'auth/weak-password'){
                        //Thrown if the password is not strong enough.
                        document.querySelector("#passwordErrorAlert").innerHTML = "The Password you have Entered is not Strong Enough";
                        document.querySelector("#passwordConfirmErrorAlert").innerHTML = "The Password you have Entered is not Strong Enough";

                    } else {
                        alert(errorMessage);
                    }
                    console.log(error);
                });

                var user = auth.currentUser;

                user.sendEmailVerification().then(function() {
                    // Email sent.
                    console.log("Email Verification Sent");
                }).catch(function(error) {
                    // An error happened.
                    console.log("Email Verification Not Sent");
                });
            }else{
                document.querySelector("#passwordErrorAlert").innerHTML = "The Passwords you have Entered do not Match";
                document.querySelector("#passwordConfirmErrorAlert").innerHTML = "The Passwords you have Entered do not Match";
            }
        }
        else {
            document.querySelector("#fnameErrorAlert").innerHTML = "You Must Enter your First & Last Name";
            document.querySelector("#lnameErrorAlert").innerHTML = "You Must Enter your First & Last Name";
        }
    }

    function clearEmailErrorAlert() {
        document.querySelector("#emailErrorAlert").innerHTML = "";
    }

    function clearPasswordErrorAlert() {
        document.querySelector("#passwordErrorAlert").innerHTML = "";
        document.querySelector("#passwordConfirmErrorAlert").innerHTML = "";
    }

    function clearNameErrorAlert() {
        document.querySelector("#fnameErrorAlert").innerHTML = "";
        document.querySelector("#lnameErrorAlert").innerHTML = "";
    }



</script>

</body>
</html>


