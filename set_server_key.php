<?php
$accessToken = $_POST['access_token'];
file_put_contents("server_key.txt", $accessToken);