<?php

include '../business system/config.php';

$auth_uid =  $_GET['uid'];
$auth_name =  $_GET['name'];
$auth_email =  $_GET['email'];

$fixedUID  = $conn->real_escape_string($auth_uid);
$fixedName  = $conn->real_escape_string($auth_name);
$fixedEmail = $conn->real_escape_string($auth_email);

$nameArray = explode(" ", $fixedName);
$auth_fname = $nameArray[0];
$auth_lname = $nameArray[1];

// Check If Client Exist In Database
$result = $conn->query("SELECT * FROM clients WHERE uid='$fixedUID'");
$user = $result->fetch_assoc();

//gets current users account info
$db_fname = $user['fname'];
$db_lname = $user['lname'];
$db_email = $user['email'];

if ($auth_fname != $db_fname){
    //update Name to match users current name as it is in firebase
    $syncfname = "UPDATE clients SET name='$auth_fname' WHERE uid='$fixedUID';";
    $conn->query($syncfname);
}
if ($auth_lname != $db_lname){
    //update Name to match users current name as it is in firebase
    $synclname = "UPDATE clients SET name='$auth_lname' WHERE uid='$fixedUID';";
    $conn->query($synclname);
}
if($fixedEmail != $db_email){
    //update Email to match users current email as it is in firebase
    $syncEmail = "UPDATE clients SET email='$fixedEmail' WHERE uid='$fixedUID';";
    $conn->query($syncEmail);
}

$conn->close();

session_start();
$_SESSION["uid"] = $fixedUID;
//$_SESSION["clientID"] = $db_clientID;
//$_SESSION["name"] = $fixedName;
//$_SESSION["email"] = $fixedEmail;

header("Location: page-dashboard.php");