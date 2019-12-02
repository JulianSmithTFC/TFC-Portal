<!-- stores info in db  -->
<?php
if ( isset( $_POST['submit'] ) ){

    include '../config.php';

    $fname = $conn->real_escape_string($_POST['fname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $clientCompanyName = $conn->real_escape_string($_POST['clientCompanyName']);
    $clientEmail = $conn->real_escape_string($_POST['clientEmail']);
    $clinetuid = $conn->real_escape_string($_POST['clinetuid']);
    $clientPhone = $conn->real_escape_string($_POST['clientPhone']);
    $clientDomain = $conn->real_escape_string($_POST['clientDomain']);
    $clientTestingDomain = $conn->real_escape_string($_POST['clientTestingDomain']);
    $clientInvoiceOne = $conn->real_escape_string($_POST['clientInvoiceOne']);
    $clientInvoiceTwo = $conn->real_escape_string($_POST['clientInvoiceTwo']);
    $assignedTeam = $conn->real_escape_string($_POST['assignedTeam']);
    $assignedAccountManager = $conn->real_escape_string($_POST['assignedAccountManager']);
    $websiteProgress = $conn->real_escape_string($_POST['websiteProgress']);
    $websiteTrelloLink = $conn->real_escape_string($_POST['websiteTrelloLink']);
    $ticketStatus = $conn->real_escape_string($_POST['ticketStatus']);









    $sql = "INSERT INTO newWebsiteTicket(fname, lname, clientCompanyName, clientEmail, clinetuid, clientPhone, clientDomain, clientTestingDomain, clientInvoiceOne, clientInvoiceTwo, assignedTeam, assignedAccountManager, websiteProgress, websiteTrelloLink, ticketStatus)
VALUES('$fname', '$lname', '$clientCompanyName', '$clientEmail', '$clinetuid', '$clientPhone', '$clientDomain', '$clientTestingDomain', '$clientInvoiceOne', '$clientInvoiceTwo', '$assignedTeam', '$assignedAccountManager', '$websiteProgress', '$websiteTrelloLink', '$ticketStatus');";



    if ($conn->query($sql)) {

        $lastInsert_id = $conn->insert_id;
        include 'parts/functions-trello.php';
        $copiedBoardID = copy_board($clientCompanyName, $lastInsert_id, $conn);
        add_users($copiedBoardID);

        header("Location: dashboardWebsite.php");

    } else {
        echo "Error sql1 fail: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
