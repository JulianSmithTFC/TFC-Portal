
//Signup Function
function signup() {

    var auth = firebase.auth();

    var user = auth.currentUser;

    if (user === null){
        let signupEmail = document.querySelector("#newEmail").value;
        let signupPassword = document.querySelector("#newPassword").value;

        auth.createUserWithEmailAndPassword( signupEmail, signupPassword).catch(function(error) {
            // Handle Errors here.

            var errorCode = error.code;
            var errorMessage = error.message;
            if (errorCode === 'auth/email-already-in-use'){
                alert('The Email Already Exist');
            }
            else if (errorCode === 'auth/invalid-email'){
                alert('You Entered an Invalid Email');
            }
            else if (errorCode === 'auth/weak-password'){
                alert('The password is too weak');
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
    }
    else{
        alert('You Are Already Signed In');
    }


}

