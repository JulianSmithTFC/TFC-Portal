<?php

include '../config.php';

// Get the customer ID.
$ticketID = intval($_GET['id']);

// If form was submitted, update the customer.
if (!empty($_POST['ticketID'])) {

    session_start();
    $ticketStatus = $_SESSION['ticketStatus'];
    $currentTicketStatus = $_POST['ticketStatus'];

    if (($ticketStatus != $currentTicketStatus) and ($currentTicketStatus != 'Contacted') and ($currentTicketStatus != 'Closed') and ($currentTicketStatus != 'Reopened') and ($currentTicketStatus != 'Open')){


        if (($_POST['assignee1'] != 'Not Assigned') and ($_POST['assignee2'] != 'Not Assigned')){
            $recipients = ($_POST['email'] . ', julian@techfusionconsulting.com, diego@techfusionconsulting.com');
        }
        elseif (($_POST['assignee1'] == 'Julian Smith')){
            $recipients = ($_POST['email'] . ', julian@techfusionconsulting.com');
        }
        elseif (($_POST['assignee1'] == 'Diego Espinoza')){
            $recipients = ($_POST['email'] . ', diego@techfusionconsulting.com');
        }
        else{
            $recipients = ($_POST['email']);
        }

        if ($currentTicketStatus == 'In Progress'){
            include 'Notification Emails/email-InProgress.php';
        }
        elseif ($currentTicketStatus == 'Completed'){
            include 'Notification Emails/email-Completed.php';
        }

        mail($recipients, $subject, $message, $mailheader) or die("Error!");

    }


    $ticketUpdated = true;

    $sql = "UPDATE ticket
        SET
        computerPassWord =?, 
        adapter =?, 
        computerDes =?, 
        computerIsu =?, 
        systemRestoreNeeded =?, 
        antiVirus =?, 
        topCaseCondition =?, 
        topCaseDetails =?, 
        topCaseDents =?, 
        topCaseDentConditionDetails =?,
         topCaseMarks =?, 
         topCaseMarksInfo =?, 
         topCaseCracks =?, 
         topCaseCracksInfo =?, 
         bottomCaseScratches =?, 
         bottomCaseDents =?, 
         bottomCaseDentsInfo =?, 
         bottomCaseMarks =?, 
         bottomCaseMarksDetails =?, 
         bottomCaseCracks =?, 
         bottomCaseCracksDetails =?, 
         palmrestCondition =?, 
         palmrestConditionDetails =?, 
         pamlRestDent =?, 
         pamlRestDentDetails =?, 
         pamlRestMarks =?, 
         pamlRestMarksDetails =?, 
         pamlRestCracks =?, 
         pamlRestCracksDetails =?, 
         ScreenScratches =?, 
         detailsAboutScreenScratches =?, 
         ScreenDents =?, 
         ScreenDentsDetails =?, 
         ScreenMarks =?, 
         ScreenMarksDetails =?, 
         ScreenCracks =?, 
         ScreenCracksDetails =?,
         ticketCreator =?,
         assignee1=?,
         assignee2=?,
         ticketPriority=?,
         creatorNotes=?,
         assignee1Notes=?,
         assignee2Notes=?,
         ticketStatus=?
        WHERE ticketID = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die($conn->error);
    }

    $stmt->bind_param(
        'sssssssssssssssssssssssssssssssssssssssssssssi',
        $_POST['pWord'],
        $_POST['adapter'],
        $_POST['compDes'],
        $_POST['compIssu'],
        $_POST['restore'],
        $_POST['antiVirus'],
        $_POST['topCaseCondition'],
        $_POST['topCaseDetails'],
        $_POST['topCaseDents'],
        $_POST['topCaseDentConditionDetails'],
        $_POST['topCaseMarks'],
        $_POST['topCaseMarksInfo'],
        $_POST['topCaseCracks'],
        $_POST['topCaseCracksInfo'],
        $_POST['bottomCaseScratches'],
        $_POST['bottomCaseDents'],
        $_POST['bottomCaseDentsInfo'],
        $_POST['bottomCaseMarks'],
        $_POST['bottomCaseMarksDetails'],
        $_POST['bottomCaseCracks'],
        $_POST['bottomCaseCracksDetails'],
        $_POST['palmrestCondition'],
        $_POST['palmrestConditionDetails'],
        $_POST['pamlRestDent'],
        $_POST['pamlRestDentDetails'],
        $_POST['pamlRestMarks'],
        $_POST['pamlRestMarksDetails'],
        $_POST['pamlRestCracks'],
        $_POST['pamlRestCracksDetails'],
        $_POST['ScreenScratches'],
        $_POST['detailsAboutScreenScratches'],
        $_POST['ScreenDents'],
        $_POST['ScreenDentsDetails'],
        $_POST['ScreenMarks'],
        $_POST['ScreenMarksDetails'],
        $_POST['ScreenCracks'],
        $_POST['ScreenCracksDetails'],
        $_POST['ticketCreator'],
        $_POST['assignee1'],
        $_POST['assignee2'],
        $_POST['ticketPriority'],
        $_POST['creatorNotes'],
        $_POST['assignee1Notes'],
        $_POST['assignee2Notes'],
        $_POST['ticketStatus'],
        $_POST['ticketID']
    );

    $stmt->execute();

    if ($stmt->error) {
        die($stmt->error);
    }

    $stmt->close();
}

// Load the ticket.
$result = $conn->query("SELECT * FROM ticket WHERE ticketID = {$ticketID}") or die($conn->error);
$ticket = $result->fetch_assoc();

$uid = $ticket['uid'];

$result2 = $conn->query("SELECT * FROM customers WHERE uid = ('$uid')") or die($conn->error);
$customer= $result2->fetch_assoc();

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Ticket Info</title>

    <!-- Google Firebase Auth -->
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-auth.js"></script>

    <script type="text/javascript" src="../../js/login business portal/config.js"></script>

    <script type="text/javascript" src="../../js/login business portal/enforcer.js"></script>

    <?php
    include '../../libraries/includes-header.php';
    ?>

</head>

<body class="grey lighten-3">

<?php include '../../templet parts/bp-mainNavigation.php'; ?>

<!--Main layout-->
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

        <!-- Main Content Goes Here -->
        <div>

            <div align="center">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Computer Intake Form</h1>
                        <p class="lead">Please fill out all fields below.</p>
                        <p class="lead">* = required</p>
                    </div>
                </div>

                <form method="POST">
                    <div class="form-group col-md-10" align="left">
                        <label for="uid">Customer uid</label>
                        <input type="text" class="form-control" id="uid" placeholder="Company Name" name="uid" value="<?= $customer['uid'] ?>" disabled/>
                    </div>
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-6">
                            <label for="inputFirstName1">*First Name</label>
                            <input type="text" class="form-control" id="inputFirstName1" placeholder="First Name" name="fName" value="<?= $customer['fname'] ?>" disabled />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLastName1">*Last Name</label>
                            <input type="text" class="form-control" id="inputLastName1" placeholder="Last Name" name="lName" value="<?= $customer['lname'] ?>" disabled />
                        </div>
                    </div>
                    <div class="form-group col-md-10" align="left">
                        <label for="inputCompanyName1">Company Name</label>
                        <input type="text" class="form-control" id="inputCompanyName1" placeholder="Company Name" name="companyName" value="<?= $customer['companyName'] ?>" disabled/>
                    </div>
                    <div class="form-group col-md-10" align="left">
                        <label for="inputEmail4">*Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="<?= $customer['email'] ?>" disabled />
                    </div>
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-6">
                            <label for="inputPhoneNumber2">*Cell Phone</label>
                            <input type="tel" class="form-control" id="inputPhoneNumber2" placeholder="Phone Number" name="cNumber" value="<?= $customer['cellPhone'] ?>" disabled />
                        </div>
                    </div>
                    <div class="form-row col-md-10" align="left">
                        <div class="form-group col-md-6">
                            <label for="inputPhoneNumber1">Business Phone</label>
                            <input type="tel" class="form-control" id="inputPhoneNumber1" placeholder="Phone Number" name="bPhone" value="<?= $customer['businessPhone'] ?>" disabled />
                        </div>
                        <div class="form-group col-md-2">
                            <label for="phoneEXT">EXT</label>
                            <input type="text" class="form-control" id="phoneEXT" name="phoneExt" value="<?= $customer['businessPhoneExt'] ?>" disabled />
                        </div>
                    </div>

                    <div class="form-group col-md-10" align="left">
                        <label for="inputComputerPassword">Password if needed to login to computer:</label>
                        <input type="text" class="form-control" id="inputComputerPassword" placeholder="Computer Password" name="pWord" value="<?= $ticket['computerPassWord'] ?>" />
                    </div>
                    <div class="form-group col-md-10" align="left">
                        <label>*Power Adapter included?:</label>
                        <select id="inputPAYes" class="form-control" name="adapter" >
                            <option selected value="<?= $ticket['adapter'] ?>"><?= $ticket['adapter'] ?></option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>

                    </div>
                    <div class="form-group col-md-10" align="left">
                        <label for="inputComputerDes">*Computer Description:</label>
                        <textarea class="form-control" id="inputComputerDes" rows="3" placeholder="Max text 500" name="compDes"><?= $ticket['computerDes'] ?></textarea>
                    </div>
                    <div class="form-group col-md-10" align="left">
                        <label for="inputComputerIssue">*Computer Issue:</label>
                        <textarea class="form-control" id="inputComputerIssue" rows="3" placeholder="Max text 500" name="compIssu"><?= $ticket['computerIsu'] ?></textarea>
                    </div>
                    <div class="form-group col-md-10" align="left">
                        <label>If a System restore is necessary to fix your computer would you allow us to do it? (This could lead to programs uninstalled but will not cause loss of files):</label>
                        <select id="inputSystemRestoreYes" class="form-control" name="restore" >
                            <option selected value="<?= $ticket['systemRestoreNeeded'] ?>"><?= $ticket['systemRestoreNeeded'] ?></option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>

                    </div>
                    <div class="form-group col-md-10" align="left">
                        <label>If the need arises is it acceptable for us to uninstall your antivirus?:</label>
                        <select id="inputuninstallAntivirusYes" class="form-control" name="antiVirus" >
                            <option selected value="<?= $ticket['antiVirus'] ?>"><?= $ticket['antiVirus'] ?></option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="col-md-10">
                        <h3>Item Condition</h3>
                        <p>*If you don't have a computer then you can skip this section*</p>
                        <?php

                        include 'Edite File Parts/editTopCaseCoverCondition.php';

                        include 'Edite File Parts/editBottomCaseCoverCondition.php';

                        include 'Edite File Parts/editPalmrestTouchpadKeyboardCondition.php';

                        include 'Edite File Parts/editScreenCondition.php';


                        ?>

                    </div>

                    <br />

                    <div>
                        <div class="form-group col-md-10" align="left">
                            <label for="inputTicketCreator">Ticket Creator</label>
                            <select id="inputTicketCreator" class="form-control" name="ticketCreator">
                                <option selected value="<?= $ticket['ticketCreator'] ?>"><?= $ticket['ticketCreator'] ?></option>
                                <option selected>Karly Reyes</option>
                                <option value="Diego Espinoza">Diego Espinoza</option>
                                <option value="ulian Smith">Julian Smith</option>
                            </select>
                        </div>
                        <div class="form-group col-md-10" align="left">
                            <label for="inputTicketAssignee1">Ticket Assignee #1</label>
                            <select id="inputTicketAssignee1" class="form-control" name="assignee1">
                                <option selected value="<?= $ticket['assignee1'] ?>"><?= $ticket['assignee1'] ?></option>
                                <option value="Diego Espinoza">Diego Espinoza</option>
                                <option value="Dillan Dorjahn">Dillan Dorjahn</option>
                                <option value="Julian Smith">Julian Smith</option>
                                <option value="Not Assigned">Not Assigned</option>
                            </select>
                        </div>
                        <div class="form-group col-md-10" align="left">
                            <label for="inputTicketAssignee2">Ticket Assignee #2</label>
                            <select id="inputTicketAssignee2" class="form-control" name="assignee2">
                                <option selected value="<?= $ticket['assignee2'] ?>"><?= $ticket['assignee2'] ?></option>
                                <option value="Diego Espinoza">Diego Espinoza</option>
                                <option value="Dillan Dorjahn">Dillan Dorjahn</option>
                                <option value="Julian Smith">Julian Smith</option>
                                <option value="Not Assigned">Not Assigned</option>
                            </select>
                        </div>
                        <div class="form-group col-md-10" align="left">
                            <label for="inputTicketPriority">Ticket Priority</label>
                            <select id="inputTicketPriority" class="form-control" name="ticketPriority">
                                <option selected value="<?= $ticket['ticketPriority'] ?>"><?= $ticket['ticketPriority'] ?></option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                        <div class="form-group col-md-10" align="left">
                            <label for="inputCreatorNotes">Creator Notes:</label>
                            <textarea class="form-control" id="inputCreatorNotes" rows="6" placeholder="Max text 3000" name="creatorNotes" value="<?= $ticket['creatorNotes'] ?>"><?= $ticket['creatorNotes'] ?></textarea>
                        </div>
                        <div class="form-group col-md-10" align="left">
                            <label for="inputAssigneeNotes1">Assignee #1 Notes:</label>
                            <textarea class="form-control" id="inputAssigneeNotes1" rows="8" placeholder="Max text 6000" name="assignee1Notes" value="<?= $ticket['assignee1Notes'] ?>"><?= $ticket['assignee1Notes'] ?></textarea>
                        </div>
                        <div class="form-group col-md-10" align="left">
                            <label for="inputAssigneeNotes2">Assignee #2 Notes:</label>
                            <textarea class="form-control" id="inputAssigneeNotes2" rows="8" placeholder="Max text 6000" name="assignee2Notes" value="<?= $ticket['assignee2Notes'] ?>"><?= $ticket['assignee2Notes'] ?></textarea>
                        </div>
                        <div class="form-group col-md-10" align="left">
                            <label for="inputTicketStatus">Ticket Status</label>
                            <select id="inputTicketStatus" class="form-control" name="ticketStatus">
                                <option selected value="<?= $ticket['ticketStatus'] ?>"><?= $ticket['ticketStatus'] ?></option>
                                <option value="Open">Open</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                                <option value="Contacted">Contacted</option>
                                <option value="Closed">Closed</option>
                                <option value="Reopened">Reopened</option>
                            </select>
                        </div>

                        <div class="form-group col-md-10" align="left">
                            <input type="hidden" name="ticketID" value="<?= $ticketID ?>">
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>


                    <?php
                    $ticketStatus = $ticket['ticketStatus'];
                    session_start();
                    $_SESSION['ticketStatus'] = $ticketStatus;
                    ?>



                </form>
            </div>

    </div>
</main>
<!--Main layout-->

<!--Footer-->
<footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">

    </div>
    <!--/.Call to action-->

    <!--Copyright-->
    <div class="footer-copyright py-3">
        © 2019 Copyright:
        <a href="https://techfusionconsulting.com/" target="_blank"> Tech Fusion LLC </a>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

<?php
require '../../libraries/includes-footer.php';
?>


</body>

</html>
