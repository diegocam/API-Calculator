<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    include "Calculate.php";
    $calculate = new Calculate($_POST['request']);
    $response = $calculate->response();
} else {
    $response = array(
        "error" => array(
            "code" => 404,
            "message" => "Method {$_SERVER['REQUEST_METHOD']} not available on this endpoint"
        )
    );
}

header('Content-Type: application/json');
echo json_encode($response);



