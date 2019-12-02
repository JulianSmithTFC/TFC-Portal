<?php

function email($clinetuid, $fname, $lname , $email){

    $clientName = ($fname . ' ' . $lname);

    $recipients = ($email);

    $subject = "Your Device Ticket is Completed";

    $mailheader .= "From: postmaster@southerntechfusion.com \r\n";
    $mailheader .= "MIME-Version: 1.0\r\n";
    $mailheader .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message = "<html><body>";
    $message .= "<div align='center'>";
    $message .= "<h2>Please Click On the Link to Create Your Account</h2>";
    $message .= "<p><a href='https://tfcportal.com/client%20system/form-newUser.php?uid=$clinetuid'>Click Here!</a></p>";
    $message .= "</div>";
    $message .= "</body></html>";

    mail($recipients, $subject, $message, $mailheader) or die("Error!");
}