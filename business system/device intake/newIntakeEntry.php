<!-- stores info in db  -->
<?php
if ( isset( $_POST['submit'] ) ){

    include '../config.php';

    $recipients = ($_POST['email'] . ', info@techfusionconsulting.com');
    include 'Notification Emails/email-NewTicket.php';
    mail($recipients, $subject, $message, $mailheader) or die("Error!");


    $uid = $conn->real_escape_string($_POST['uid']);
    $computerPassWord = $conn->real_escape_string($_POST['pWord']);
    $adapter = $conn->real_escape_string($_POST['adapter']);
    $computerDes = $conn->real_escape_string($_POST['compDes']);
    $computerIsu = $conn->real_escape_string($_POST['compIssu']);
    $systemRestoreNeeded = $conn->real_escape_string($_POST['restore']);
    $antiVirus = $conn->real_escape_string($_POST['antiVirus']);
    $topCaseCondition = $conn->real_escape_string($_POST['topCaseCondition']);
    $topCaseDetails = $conn->real_escape_string($_POST['topCaseDetails']);
    $topCaseDents = $conn->real_escape_string($_POST['topCaseDents']);
    $topCaseDentConditionDetails = $conn->real_escape_string($_POST['topCaseDentConditionDetails']);
    $topCaseMarks = $conn->real_escape_string($_POST['topCaseMarks']);
    $topCaseMarksInfo = $conn->real_escape_string($_POST['topCaseMarksInfo']);
    $topCaseCracks = $conn->real_escape_string($_POST['topCaseCracks']);
    $topCaseCracksInfo = $conn->real_escape_string($_POST['topCaseCracksInfo']);
    $bottomCaseScratches = $conn->real_escape_string($_POST['bottomCaseScratches']);
    $bottomCaseDents = $conn->real_escape_string($_POST['bottomCaseDents']);
    $bottomCaseDentsInfo = $conn->real_escape_string($_POST['bottomCaseDentsInfo']);
    $bottomCaseMarks = $conn->real_escape_string($_POST['bottomCaseMarks']);
    $bottomCaseMarksDetails = $conn->real_escape_string($_POST['bottomCaseMarksDetails']);
    $bottomCaseCracks = $conn->real_escape_string($_POST['bottomCaseCracks']);
    $bottomCaseCracksDetails = $conn->real_escape_string($_POST['bottomCaseCracksDetails']);
    $palmrestCondition = $conn->real_escape_string($_POST['palmrestCondition']);
    $palmrestConditionDetails = $conn->real_escape_string($_POST['palmrestConditionDetails']);
    $pamlRestDent = $conn->real_escape_string($_POST['pamlRestDent']);
    $pamlRestDentDetails = $conn->real_escape_string($_POST['pamlRestDentDetails']);
    $pamlRestMarks = $conn->real_escape_string($_POST['pamlRestMarks']);
    $pamlRestMarksDetails = $conn->real_escape_string($_POST['pamlRestMarksDetails']);
    $pamlRestCracks = $conn->real_escape_string($_POST['pamlRestCracks']);
    $pamlRestCracksDetails = $conn->real_escape_string($_POST['pamlRestCracksDetails']);
    $ScreenScratches = $conn->real_escape_string($_POST['ScreenScratches']);
    $detailsAboutScreenScratches = $conn->real_escape_string($_POST['detailsAboutScreenScratches']);
    $ScreenDents = $conn->real_escape_string($_POST['ScreenDents']);
    $ScreenDentsDetails = $conn->real_escape_string($_POST['ScreenDentsDetails']);
    $ScreenMarks = $conn->real_escape_string($_POST['ScreenMarks']);
    $ScreenMarksDetails = $conn->real_escape_string($_POST['ScreenMarksDetails']);
    $ScreenCracks = $conn->real_escape_string($_POST['ScreenCracks']);
    $ScreenCracksDetails = $conn->real_escape_string($_POST['ScreenCracksDetails']);



//this if for the edit/updating of the customer intake

//$ticketCreator = $conn->real_escape_string($_POST['ticketCreator']);
//$assignee1 = $conn->real_escape_string($_POST['assignee1']);
//$assignee2 = $conn->real_escape_string($_POST['assignee2']);
//$ticketPriority = $conn->real_escape_string($_POST['ticketPriority']);
//$creatorNotes = $conn->real_escape_string($_POST['creatorNotes']);
//$assignee1Notes = $conn->real_escape_string($_POST['assignee1Notes']);
//$assignee2Notes = $conn->real_escape_string($_POST['assignee2Notes']);
//$ticketStatus = $conn->real_escape_string($_POST['ticketStatus']);




    $sql = "INSERT INTO ticket(uid,computerPassWord, adapter, computerDes, computerIsu, systemRestoreNeeded, antiVirus, topCaseCondition, topCaseDetails, topCaseDents, topCaseDentConditionDetails, topCaseMarks, topCaseMarksInfo, topCaseCracks, topCaseCracksInfo, bottomCaseScratches, bottomCaseDents, bottomCaseDentsInfo, bottomCaseMarks, bottomCaseMarksDetails, bottomCaseCracks, bottomCaseCracksDetails, palmrestCondition, palmrestConditionDetails, pamlRestDent, pamlRestDentDetails, pamlRestMarks, pamlRestMarksDetails, pamlRestCracks, pamlRestCracksDetails, ScreenScratches, detailsAboutScreenScratches, ScreenDents, ScreenDentsDetails, ScreenMarks, ScreenMarksDetails, ScreenCracks, ScreenCracksDetails)
VALUES('$uid','$computerPassWord','$adapter','$computerDes','$computerIsu','$systemRestoreNeeded','$antiVirus','$topCaseCondition','$topCaseDetails','$topCaseDents','$topCaseDentConditionDetails','$topCaseMarks','$topCaseMarksInfo','$topCaseCracks','$topCaseCracksInfo','$bottomCaseScratches','$bottomCaseDents','$bottomCaseDentsInfo','$bottomCaseMarks','$bottomCaseMarksDetails','$bottomCaseCracks','$bottomCaseCracksDetails','$palmrestCondition','$palmrestConditionDetails','$pamlRestDent','$pamlRestDentDetails','$pamlRestMarks','$pamlRestMarksDetails','$pamlRestCracks','$pamlRestCracksDetails','$ScreenScratches','$detailsAboutScreenScratches','$ScreenDents','$ScreenDentsDetails','$ScreenMarks','$ScreenMarksDetails','$ScreenCracks','$ScreenCracksDetails');";




    if ($conn->query($sql)) {
        header("Location: newIntakeCreated.php");
    } else {
        echo "Error sql1 fail: " . $sql . "<br>" . $conn->error;



    }


    $conn->close();
}




//Adding Ticket to Trello
$curl = curl_init();

$cardName = str_replace(" ", "%20", $computerDes);
$cardDes = str_replace(" ", "%20", $computerIsu);

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.trello.com/1/cards?name=$cardName&desc=$cardDes&pos=top&due=&idList=5d27619ef2771b3e57c4bd81&idLabels=5d276170af988c41f245deb9&urlSource=http://tfcportal.com/device%20intake/dashboardIntake.php&oauth_consumer_key=ba9f3985fce0217a728d080cb72e27eb&oauth_token=3019e39450f960bc90319556e95484dc48956bc3c7681dae72500192d0268626&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1562862880&oauth_nonce=8PV46CzTNpd&oauth_version=1.0&oauth_signature=9b4tufg7DQ2rE8rKXCwbke9UTrk=",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => array(
        "Accept: */*",
        "Accept-Encoding: gzip, deflate",
        "Cache-Control: no-cache",
        "Connection: keep-alive",
        "Content-Length: ",
        "Host: api.trello.com",
        "Postman-Token: 73501409-dc31-467d-87d1-d093796dad6d,ddd2d432-c4cb-4b59-8873-dc372e3f3f24",
        "User-Agent: PostmanRuntime/7.15.2",
        "cache-control: no-cache"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
}


//Initial Email
include 'emailfile.php';
