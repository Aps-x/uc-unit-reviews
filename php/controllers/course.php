<?php
require '../model/database.php';

if (isset($_GET['course'])) {
    // Validation
    $course_id = filter_var($_GET['course'], FILTER_SANITIZE_NUMBER_INT);

    if (!ctype_digit($course_id)) {
        show404();
    }

    if (Does_Course_Exist($conn, $course_id) === false) {
        show404();
    } 

    // Dynamic Data
    $course_info = Get_Course_Info_Array($conn, $course_id);
    $derived_course_info = Get_Derived_Course_Info_Array($conn, $course_id);
    $course_reviews = Get_Course_Reviews($conn, $course_id);
}
else {
    show404();
}

function show404() {
    http_response_code(404);
    include '../views/404.html'; 
    exit(); 
}