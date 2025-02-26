<?php

$conn = "";

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "coursesdb";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
}
catch(mysqli_sql_exception) {
    debug_to_console("Unable to connect");
}

if ($conn) {
    debug_to_console("Connection established");
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Log: " . $output . "' );</script> \n";
}