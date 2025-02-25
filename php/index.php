<?php
// D:\xampp\php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "coursesdb";

$conn = "";

$conn = msqli_connect($db_server, $db_user, $db_pass, $db_name);

if ($conn) {
    debug_to_console("Connection established");
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


debug_to_console("Verify");