firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        // User is signed in.
        console.log("You Are Signed In");
    } else {
        // No user is signed in.
        //firebase.auth().signOut();
        console.log("not signed in");
        window.location.replace("https://tfcportal.com/tfcuser.php");
    }
});


