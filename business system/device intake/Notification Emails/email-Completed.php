<?php
$subject = "Your Device Ticket is Completed";

$mailheader .= "From: postmaster@southerntechfusion.com \r\n";
$mailheader .= "MIME-Version: 1.0\r\n";
$mailheader .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = "<html><body>";
$message .= "<div align='center'>";
$message .= "<h1 style='color: #f30a00'>Here is Your Update</h1>";
$message .= "<hr style='background-color: #6bacbe; border-color: #6bacbe;'/>";
$message .= "<br/>";
$message .= "<div style='background-color: #e5f3f5; width: 400px; padding-top: 20px; padding-bottom: 20px'>";
$message .= "<h1 style='color: #002b37;'>". $_POST['fName'] ." ". $_POST['lName'] ."</h1>";
$message .= "<h3>Your Ticket Number is: ". $_POST['ticketID'] ."</h3>";
$message .= "</div>";
$message .= "<br/>";
$message .= "<div style='background-color: #e5f3f5; padding: 30px 30px 30px 30px; width: 300px;'>";
$message .= "<p style='color: #07104a; margin-top: 0px; margin-bottom: 0px;'>Status of Device:</p>";
$message .= "<h2 style='font-size: 35px; color: #43b756; margin-top: 0px; margin-bottom: 0px;'>Completed</h2>";
$message .= "</div>";
$message .= "<h4 style='color: #d02e23;'>*You should receive a phone call<br/>within a day! Your device will be ready for pick up soon.</h4>";
$message .= "<br/>";
$message .= "<img src='http://tfcportal.com/img/techfusion_logo.png' width='300px' alt='TF Logo'>";
$message .= "<br/>";
$message .= "<p style='color: #124d67;'>Tech Fusion is doing their best to get your device<br/>ready for you. We thank you for your patience!</p>";
$message .= "<hr style='max-width: 200px;'/>";
$message .= "<p style='color: #124d67;'>710 S. Main St. Troy, IL 62294<br/>Info@TechFusionConsulting.com<br/><a href='https://techfusionconsulting.com/'>TechFusionConsulting.com</a><br/>(314) 690-3564</p>";
$message .= "</div>";
$message .= "</body></html>";

?>