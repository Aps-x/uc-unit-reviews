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

function Get_All_Courses_Array($conn) {
    $result = mysqli_query($conn, "SELECT * FROM course");

    $courses = [];
    while ($course = mysqli_fetch_assoc($result)) {
        $courses[] = [
            'id' => htmlspecialchars($course['ID']),
            'title' => htmlspecialchars($course['Title']),
            'description' => htmlspecialchars($course['Description'])
        ];
    }

    mysqli_free_result($result);
    return $courses;
}

function Get_Course_Info_Array($conn, $course) {
    $stmt = $conn->prepare("SELECT * FROM course WHERE id = ?");
    $stmt->bind_param("s", $course);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        return null;
    }

    return [
        'id' => htmlspecialchars($row['ID']),
        'title' => htmlspecialchars($row['Title']),
        'description' => htmlspecialchars($row['Description'])
    ];
}

function Debug_To_Console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Log: " . $output . "' );</script> \n";
}
