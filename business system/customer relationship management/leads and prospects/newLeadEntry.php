<!-- stores info in db  -->
<?php

if (($_POST['submit'] == 'Submit') || ($_POST['submit'] == 'Submit & Create Ticket')){


    include '../../config.php';

    $uid = uniqid();
    $fname = $conn->real_escape_string($_POST['fname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $companyName = $conn->real_escape_string($_POST['companyName']);
    $email = $conn->real_escape_string($_POST['email']);
    $businessPhone = $conn->real_escape_string($_POST['businessPhone']);
    $businessPhoneExt = $conn->real_escape_string($_POST['businessPhoneExt']);
    $cellPhone = $conn->real_escape_string($_POST['cellPhone']);
    $howDidYouHear = $conn->real_escape_string($_POST['howDidYouHear']);
    $leadRating = $conn->real_escape_string($_POST['leadRating']);
    $leadServiceIntrest = $conn->real_escape_string($_POST['leadServiceIntrest']);
    $leadSource = $conn->real_escape_string($_POST['leadSource']);
    $leadStatus = $conn->real_escape_string($_POST['leadStatus']);

    $sql = "INSERT INTO leads(uid, fname, lname, companyName, email, businessPhone, businessPhoneExt, cellPhone, howDidYouHear, leadRating, leadServiceIntrest, leadSource, leadStatus)
VALUES('$uid', '$fname', '$lname','$companyName','$email', '$businessPhone', '$businessPhoneExt', '$cellPhone', '$howDidYouHear', '$leadRating', '$leadServiceIntrest', '$leadSource', '$leadStatus');";

}


if ($_POST['submit'] == 'Submit') {
    if ($conn->query($sql)) {

        header("Location: newLeadCreated.php");

    } else {
        echo "Error sql1 fail: " . $sql . "<br>" . $conn->error;
    }

}

$conn->close();

?>