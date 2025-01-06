<?php
$message = $_POST['message'];
$accessToken = file_get_contents("server_key.txt");
data = [
        'message' => [
            'topic' => '/topics/all',
            'notification' => [
                'title' => "Hello world",
                'body' => "This is a notification test",
            ],
            'data' => [
            ]
        ]
    ];

    // Initialize cURL
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $accessToken,
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Execute the request
    $response = curl_exec($ch);
    
    echo $response;