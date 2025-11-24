<?php

$tableau = array(
    'POST' => $_POST,
    'SERVER' => $_SERVER
);
echo json_encode($tableau);







// header("Access-Control-Allow-Origin: *"); // or "http://localhost:8080"
// header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
