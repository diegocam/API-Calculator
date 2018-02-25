<?php
header('Content-Type: application/json');
$url = 'http://localhost/api/process.php'; //this changes according to your environment

$json = '{"numbers":[1,23,2,3,4]}';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, array("request" => $json));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
$curl_response = curl_exec($ch);
curl_close($ch);
