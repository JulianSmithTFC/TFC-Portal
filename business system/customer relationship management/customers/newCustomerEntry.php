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
    $studentStatus = $conn->real_escape_string($_POST['studentStatus']);
    $gradDate = $conn->real_escape_string($_POST['gradDate']);
    $howDidYouHear = $conn->real_escape_string($_POST['howDidYouHear']);



    $sql = "INSERT INTO customers(uid, fname, lname, companyName, email, businessPhone, businessPhoneExt, cellPhone, studentStatus, gradDate, howDidYouHear)
VALUES('$uid', '$fname', '$lname','$companyName','$email','$businessPhone','$businessPhoneExt','$cellPhone','$studentStatus','$gradDate','$howDidYouHear');";

}


if ($_POST['submit'] == 'Submit') {
        if ($conn->query($sql)) {
            header("Location: newCustomerCreated.php");

        } else {
            echo "Error sql1 fail: " . $sql . "<br>" . $conn->error;
        }

}
elseif ($_POST['submit'] == 'Submit & Create Ticket'){

    if ($conn->query($sql)) {

        $customerID = $_SESSION['$customerID'];

        if ($customerID != ''){
            session_unset();
        }

        $result = $conn->query("SELECT * FROM customers WHERE customerID=(SELECT MAX(customerID) FROM customers)");
        $customer = $result->fetch_assoc();

        $customerID = $customer['customerID'];

        session_start();
        $_SESSION['customerID'] = $customerID;

       header("Location: https://tfcportal.com/business%20system/device%20intake/formIntake.php");

    } else {
        echo "Error sql1 fail: " . $sql . "<br>" . $conn->error;
    }
}



$conn->close();

?>