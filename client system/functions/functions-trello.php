<?php

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

        $decOne = ($rawOne/$totalNum);
        $decTwo = ($rawTwo/$totalNum);
        $decThree = ($rawThree/$totalNum);

        $percOne = round($decOne * 100);
        $percTwo = round($decTwo * 100);
        $percThree = round($decThree * 100);


        $progressArray = array(
            "0" => array(
                "count" => $rawOne,
                "decimal" => $decOne,
                "percentage" => $percOne,
            ),
            "1" => array(
                "count" => $rawTwo,
                "decimal" => $decTwo,
                "percentage" => $percTwo,
            ),
            "2" => array(
                "count" => $rawThree,
                "decimal" => $decThree,
                "percentage" => $percThree,
            ),
        );

        return $progressArray;

    }
}