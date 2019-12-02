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
    $faxNumber = $conn->real_escape_string($_POST['faxNumber']);
    $addressLine = $conn->real_escape_string($_POST['addressLine']);
    $addressCity = $conn->real_escape_string($_POST['addressCity']);
    $addressState = $conn->real_escape_string($_POST['addressState']);
    $addressZipCode = $conn->real_escape_string($_POST['addressZipCode']);
    $howDidYouHear = $conn->real_escape_string($_POST['howDidYouHear']);




    $sql = "INSERT INTO clients(uid, fname, lname, companyName, email, businessPhone, businessPhoneExt, cellPhone, faxNumber, addressLine, addressCity, addressState, addressZipCode, howDidYouHear)
VALUES('$uid', '$fname', '$lname','$companyName','$email', '$businessPhone', '$businessPhoneExt', '$cellPhone', '$faxNumber', '$addressLine', '$addressCity', '$addressState', '$addressZipCode', '$howDidYouHear');";

}


if ($_POST['submit'] == 'Submit') {
    if ($conn->query($sql)) {


        include 'parts/functions-email.php';
        email($uid, $fname, $lname , $email);

        header("Location: newClientCreated.php");

    } else {
        echo "Error sql1 fail: " . $sql . "<br>" . $conn->error;
    }

}

$conn->close();

?>