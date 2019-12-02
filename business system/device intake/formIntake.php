<?php
session_start();
$customerID = $_SESSION['customerID'];
session_unset();
session_destroy();

if ($customerID == ''){
    // Get the customer ID.
    $customerID = intval($_GET['id']);
}

if ($customerID != ''){

    include '../config.php';

    $result = $conn->query("SELECT * FROM customers WHERE customerID = $customerID");
    $customer = $result->fetch_assoc();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Create Intake Ticket</title>

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
        <div align="center">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Computer Intake Form</h1>
                    <p class="lead">Please fill out all fields below.</p>
                    <p class="lead">* = required</p>
                </div>
            </div>

            <form action="newIntakeEntry.php" method="POST">

                <div class="form-row col-md-10" align="left">
                    <div class="form-group col-md-10">
                        <label for="uid">Customer Uid</label>
                        <input
                                type="text"
                                class="form-control"
                                id="uid"
                                placeholder="uid"
                                name="uid"
                                required="true"
                                value="<?= $customer['uid'] ?>"
                        />
                    </div>
                    <div class="form-group col-md-10">
                        <label for="inputFirstName1">First Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="inputFirstName1"
                            placeholder="First Name"
                            name="fName"
                            required="true"
                            value="<?= $customer['fname'] ?>"
                            disabled
                        />
                    </div>
                    <div class="form-group col-md-10">
                        <label for="inputLastName1">Last Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="inputLastName1"
                            placeholder="Last Name"
                            name="lName"
                            required="true"
                            value="<?= $customer['lname'] ?>"
                            disabled
                        />
                    </div>
                </div>
                <div class="form-group col-md-10" align="left">
                    <label for="inputCompanyName1">Company Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="inputCompanyName1"
                        placeholder="Company Name"
                        name="companyName"
                        value="<?= $customer['companyName'] ?>"
                        disabled
                    />
                </div>
                <div class="form-group col-md-10" align="left">
                    <label for="inputEmail4">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="inputEmail4"
                        placeholder="Email"
                        name="email"
                        required="true"
                        value="<?= $customer['email'] ?>"
                        disabled
                    />
                </div>
                <div class="form-group col-md-10" align="left">
                    <label for="cNumber">Cell Phone</label>
                    <input
                            type="tel"
                            class="form-control"
                            id="cNumber"
                            placeholder="Phone Number"
                            name="cNumber"
                            value="<?= $customer['cellPhone'] ?>"
                            disabled
                    />
                </div>
                <div class="form-row col-md-10" align="left">
                    <div class="form-group col-md-10">
                        <label for="inputPhoneNumber1">Business Phone</label>
                        <input
                            type="tel"
                            class="form-control"
                            id="inputPhoneNumber1"
                            placeholder="Phone Number"
                            name="bPhone"
                            value="<?= $customer['businessPhone'] ?>"
                            disabled
                        />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="phoneEXT">EXT</label>
                        <input
                            type="text"
                            class="form-control"
                            id="phoneEXT"
                            name="phoneExt"
                            value="<?= $customer['businessPhoneExt'] ?>"
                            disabled
                        />
                    </div>
                </div>

                <div class="form-group col-md-10" align="left">
                    <label for="inputComputerPassword">Password if needed to login to computer:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="inputComputerPassword"
                        placeholder="Computer Password"
                        name="pWord"
                    />
                </div>
                <div class="form-group col-md-10" align="left">
                    <label>*Power Adapter included?:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="adapter" id="inputPAYes" value="Yes">
                        <label class="form-check-label" for="inputPAYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="adapter" id="inputPANo" value="No">
                        <label class="form-check-label" for="inputPANo">No</label>
                    </div>
                </div>
                <div class="form-group col-md-10" align="left">
                    <label for="inputComputerDes">*Computer Description:</label>
                    <textarea
                        class="form-control"
                        id="inputComputerDes"
                        rows="3"
                        placeholder="Max text 500"
                        name="compDes"
                        required="true"
                    ></textarea>
                </div>
                <div class="form-group col-md-10" align="left">
                    <label for="inputComputerIssue">*Computer Issue:</label>
                    <textarea
                        class="form-control"
                        id="inputComputerIssue"
                        rows="3"
                        placeholder="Max text 500"
                        name="compIssu"
                        required="true"></textarea>
                </div>
                <div class="form-group col-md-10" align="left">
                    <label>If a System restore is necessary to fix your computer would you allow us to do it? (This could
                        lead to programs uninstalled but will Not cause loss of files):</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="restore" id="inputSystemRestoreYes" value="Yes"
                               checked>
                        <label class="form-check-label" for="inputSystemRestoreYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="restore" id="inputSystemRestoreNo" value="No">
                        <label class="form-check-label" for="inputSystemRestoreNo">No</label>
                    </div>
                </div>
                <div class="form-group col-md-10" align="left">
                    <label>If the need arises is it acceptable for us to uninstall your antivirus?:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="antiVirus" id="inputuninstallAntivirusYes"
                               value="Yes" checked>
                        <label class="form-check-label" for="inputuninstallAntivirusYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="antiVirus" id="inputuninstallAntivirusNo" value="No">
                        <label class="form-check-label" for="inputuninstallAntivirusNo">No</label>
                    </div>
                </div>

                <div class="col-md-10">
                    <h3>Item Condition</h3>
                    <p>*If you don't have a computer then you can skip this section*</p>

                    <p align="left" style="font-size: 18px"><b>Top Case Cover Condition</b></p>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any scratches?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topCaseCondition" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topCaseCondition" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topCaseCondition" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="topCaseDetails"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any Dents?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topCaseDents" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topCaseDents" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topCaseDents" id="inputPASomewhat" value="somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="topCaseDentConditionDetails"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any Marks?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topCaseMarks" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topCaseMarks" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topCaseMarks" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="topCaseMarksInfo"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any Cracks?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topCaseCracks" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topCaseCracks" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="topCaseCracks" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="topCaseCracksInfo"></textarea>
                        </div>
                    </div>

                    <p align="left" style="font-size: 18px"><b>Bottom Case Cover Condition</b></p>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any scratches?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bottomCaseScratches" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bottomCaseScratches" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bottomCaseScratches" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="bottomCaseScratchesInfo"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any Dents?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bottomCaseDents" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bottomCaseDents" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bottomCaseDents" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="bottomCaseDentsInfo"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any Marks?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bottomCaseMarks" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bottomCaseMarks" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bottomCaseMarks" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="bottomCaseMarksDetails"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any Cracks?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bottomCaseCracks" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bottomCaseCracks" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bottomCaseCracks" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="bottomCaseCracksDetails"></textarea>
                        </div>
                    </div>

                    <p align="left" style="font-size: 18px"><b>Palmrest, Touchpad, & Keyboard Condition</b></p>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any scratches?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="palmrestCondition" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="palmrestCondition" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="palmrestCondition" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="palmrestConditionDetails"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any Dents?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pamlRestDent" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pamlRestDent" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pamlRestDent" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="pamlRestDentDetails"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any Marks?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pamlRestMarks" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pamlRestMarks" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pamlRestMarks" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="pamlRestMarksDetails"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any Cracks?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pamlRestCracks" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pamlRestCracks" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pamlRestCracks" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="pamlRestCracksDetails"></textarea>
                        </div>
                    </div>

                    <p align="left" style="font-size: 18px"><b>Screen Condition</b></p>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any scratches?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ScreenScratches" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ScreenScratches" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ScreenScratches" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="detailsAboutScreenScratches"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any Dents?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ScreenDents" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ScreenDents" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ScreenDents" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="ScreenDentsDetails"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any Marks?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ScreenMarks" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ScreenMarks" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ScreenMarks" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="ScreenMarksDetails"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="left">
                        <label>Does it have any Cracks?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ScreenCracks" id="inputPAYes" value="Yes">
                            <label class="form-check-label" for="inputPAYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ScreenCracks" id="inputPANo" value="No" checked>
                            <label class="form-check-label" for="inputPANo">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ScreenCracks" id="inputPASomewhat"
                                   value="Somewhat">
                            <label class="form-check-label" for="inputPASomewhat">Somewhat</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputComputerIssue">Give us some details about the condition: </label>
                            <textarea
                                class="form-control"
                                id="inputComputerIssue"
                                rows="1"
                                placeholder="Max text 500"
                                name="ScreenCracksDetails"></textarea>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2">
                            By checking this box you are verifying that the choices above are true and accurate.
                        </label>
                    </div>
                </div>

                <br/>
                <br/>

                <div class="form-group col-md-10" align="left">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>


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
