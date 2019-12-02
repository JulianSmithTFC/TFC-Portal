<?php

function copy_board($clientCompanyName, $lastInsert_id, $conn){

    $companyNameFixed = str_replace(" ", "%20", $clientCompanyName);

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.trello.com/1/boards/?name=$companyNameFixed%20Website%20Project&idBoardSource=5ced72ec6decc97de5339762&oauth_consumer_key=ba9f3985fce0217a728d080cb72e27eb&oauth_token=3019e39450f960bc90319556e95484dc48956bc3c7681dae72500192d0268626&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1562794853&oauth_nonce=Htc4rlunIN7&oauth_version=1.0&oauth_signature=bX+iRxJw8a9RXrQeGG9SjA+ubr4=",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Host: api.trello.com",
            "Postman-Token: 8617edd3-1285-498f-a962-fd22c4686a47,25b0a297-b7d5-4ceb-b9e7-121c3877a34b",
            "User-Agent: PostmanRuntime/7.15.0",
            "accept-encoding: gzip, deflate",
            "cache-control: no-cache",
            "content-length: "
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }
    else {
        $resultsJSON = $response;

        $resultsArray = json_decode($resultsJSON, true);
        $copiedBoardID = $resultsArray['id'];
        $websiteTrelloLink = $resultsArray['shortUrl'];

        $setBoardID = "UPDATE newWebsiteTicket SET trelloID = '$copiedBoardID' , websiteTrelloLink = '$websiteTrelloLink' WHERE websiteTicketID = '$lastInsert_id'";
        $conn->query($setBoardID);

        return $copiedBoardID;
    }
}


function add_users($copiedBoardID){

    $userArray = array(
        userOne => '5cc222f47fcb2a2cb1c67cea',
        userTwo => '5cbe1a5157325e05e67f2eb3'
    );

    foreach ($userArray as &$userID) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.trello.com/1/boards/$copiedBoardID/members/$userID?type=normal&oauth_consumer_key=ba9f3985fce0217a728d080cb72e27eb&oauth_token=3019e39450f960bc90319556e95484dc48956bc3c7681dae72500192d0268626&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1563938193&oauth_nonce=0cTstUko45M&oauth_version=1.0&oauth_signature=hsIhHMP2YDuqQrmCwjVRb2leHEc=",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Accept-Encoding: gzip, deflate",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Content-Length: ",
                "Host: api.trello.com",
                "Postman-Token: 3aba16bf-7d88-4b57-b9a5-d6a34d2ceec8,289fffc1-4cf4-474a-9042-d12fd8e9b453",
                "User-Agent: PostmanRuntime/7.15.2",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //echo $response;s
        }
    }
}

function deleteBoard($boardID){

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.trello.com/1/boards/$boardID?oauth_consumer_key=ba9f3985fce0217a728d080cb72e27eb&oauth_token=3019e39450f960bc90319556e95484dc48956bc3c7681dae72500192d0268626&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1563940005&oauth_nonce=qHmkZeAi1PS&oauth_version=1.0&oauth_signature=S83nkuDSpOp6pSwc2DbWdYOaunE=",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "DELETE",
        CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            "Accept-Encoding: gzip, deflate",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Content-Length: ",
            "Host: api.trello.com",
            "Postman-Token: d9c22d41-c45c-4126-9d6b-2c1b2d06e188,d973e6b7-bad0-40b5-99c0-56a8c271635a",
            "User-Agent: PostmanRuntime/7.15.2",
            "cache-control: no-cache"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        //echo $response;
    }
}


function getBoardProgress($copiedBoardID){

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.trello.com/1/boards/$copiedBoardID/lists?cards=all&oauth_consumer_key=ba9f3985fce0217a728d080cb72e27eb&oauth_token=3019e39450f960bc90319556e95484dc48956bc3c7681dae72500192d0268626&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1563942238&oauth_nonce=BRvgdKHcT2o&oauth_version=1.0&oauth_signature=gNQTiVonWM2xZEowzixSMoQTGoE=",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            "Accept-Encoding: gzip, deflate",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Host: api.trello.com",
            "Postman-Token: 032415b8-a63d-42a0-98aa-17f18941a401,6ae24e5a-68d1-4aed-ace9-ed6873f7b0b8",
            "User-Agent: PostmanRuntime/7.15.2",
            "cache-control: no-cache"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $resultsJSON = $response;
        $resultsArray = json_decode($resultsJSON, true);


        $rawOne =  count($resultsArray['0']['cards']);
        $rawTwo = count($resultsArray['1']['cards']);
        $rawThree = count($resultsArray['2']['cards']);

        $totalNum = ($rawOne + $rawTwo + $rawThree);

        $perThree = ($rawThree/$totalNum);

        $perWholeThree = round($perThree * 100);

        return $perWholeThree;

    }
}


