<?php

 header('Access-Control-Allow-Credentials: true');

    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
 header("Access-Control-Allow-Origin: http://localhost:8080");

            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header('Content-Type: application/json');
header("HTTP/1.1 500 Internal Server Error");

$data = ["status"=>"error"];
echo json_encode($data);