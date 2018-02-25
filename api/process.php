<?php

$json = file_get_contents("php://input");

include "Calculate.php";
$calculate = new Calculate($json);
$response = $calculate->response();

header('Content-Type: application/json');
echo json_encode($response);



