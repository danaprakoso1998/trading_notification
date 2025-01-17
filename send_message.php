<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$type = $_GET['type'];
$tradeType = $_GET['trade_type'];
$accessToken = file_get_contents("server_key.txt");
$data = array(
        'message' => array(
            'token' => '/topics/all',
            /*'notification' => array(
                'title' => "Hello world",
                'body' => "This is a notification test",
            ),*/
            'data' => array(
                'type' => $type,
                'trade_type' => $tradeType
            )
        )
);

    // Initialize cURL
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/v1/projects/buysell-signaller/messages:send");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $accessToken,
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Execute the request
    $response = curl_exec($ch);
    
    echo "Result: ".$response;